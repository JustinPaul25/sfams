<template>
    <div class="bg-blue-100 min-h-screen">
      <div class="py-6">
        <div class="sm:flex sm:items-center px-6">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-semibold text-gray-900">Student Information</h1>
            </div>
        </div>
        <div class="mt-4 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
          <main class="lg:col-span-12 xl:col-span-8">
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="mt-8 mb-10 flex flex-col">
                <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle">
                    <button
                      @click="toggleAccordion()"
                      class="flex items-center justify-between w-full p-5 font-medium text-left text-white focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 bg-blue-700 hover:opacity-75"
                      :aria-expanded="isOpen"
                      :aria-controls="`collapse${_uid}`"
                    >
                      Student Requirements
                      <svg
                        class="w-3 transition-all duration-200 transform"
                        :class="{
                          'rotate-180': isOpen,
                          'rotate-0': !isOpen,
                        }"
                        fill="none"
                        stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 10"
                        aria-hidden="true"
                      >
                        <path
                          d="M15 1.2l-7 7-7-7"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>

                    <div v-show="isOpen" :id="`collapse${_uid}`" class="p-5 font-light border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div v-if="requirements.coc">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.coc" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Certificate of Completion</span>
                          </label>
                        </div>
                        <div v-if="requirements.birth_cert">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.birth_cert" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">PSA Birth Certificate (Original)</span>
                          </label>
                        </div>
                        <div v-if="requirements.ECCD_checklist">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.ECCD_checklist" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">ECCD Checklist</span>
                          </label>
                        </div>
                        <div v-if="requirements.card">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.card" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Card (Form 138)</span>
                          </label>
                        </div>
                        <div v-if="requirements.picture">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.picture" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">1x1 Picture</span>
                          </label>
                        </div>
                        <div v-if="requirements.good_moral">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.good_moral" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Good Moral</span>
                          </label>
                        </div>
                        <div v-if="requirements.form_137">
                          <label class="inline-flex items-center mt-3">
                              <input v-model="form.form_137" type="checkbox" class="form-checkbox h-5 w-5 text-gray-600" checked><span class="ml-2 text-gray-700">Form 137</span>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="shadow-sm ring-1 ring-black ring-opacity-5">
                      <button
                      @click="toggleAccordionInformation()"
                      class="flex items-center justify-between w-full p-5 font-medium text-left text-white focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 bg-blue-700 hover:opacity-75"
                      :aria-expanded="isOpenInformation"
                      :aria-controls="`collapse${_uid}`"
                    >
                      Information
                      <svg
                        class="w-3 transition-all duration-200 transform"
                        :class="{
                          'rotate-180': isOpenInformation,
                          'rotate-0': !isOpenInformation,
                        }"
                        fill="none"
                        stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 16 10"
                        aria-hidden="true"
                      >
                        <path
                          d="M15 1.2l-7 7-7-7"
                          stroke-width="2"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                        />
                      </svg>
                    </button>
                        <div v-show="isOpenInformation" :id="`collapse${_uid}`">
                            <div class="bg-white shadow overflow-hidden">
                                <div class="border-t border-gray-200">
                                    <dl>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.first_name }} {{ student.middle_name }} {{ student.last_name }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Date of Birth</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.birth_date }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Place of Birth</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.birth_place }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.gender ? 'MALE' : 'FEMALE' }}</dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Grade Entered</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <div class="relative inline-block text-gray-700 w-full">
                                                    <select v-model="student.grade_entered_id" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" disabled>
                                                        <option value="" disabled>Select Grade Level</option>
                                                        <option v-for="level in levels" :value="level.id">{{ level.level }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </dd>
                                    </div>
                                    </dl>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.phone }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Mobile Number</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.phone }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">E-Mail</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.email }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Father's Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.father_name }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Father's Contact Number</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.father_phone }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Mother's Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.mother_name }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Mother's Contact Number</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.mother_phone }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Purok/Street</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.purok_street }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Barangay</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.barangay }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">City</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.city }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Province</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.province }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Contact Person</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.contact_person }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Contact Person Number</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.contact_person_number }}</dd>
                                    </div>
                                </div>
                                <div class="px-4 py-5 sm:px-6">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">Last School Information</h3>
                                </div>
                                <div class="border-t border-gray-200">
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Name</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.last_school_attended }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Address</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.last_school_address }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">Grade and Section</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.last_school_grade_section }}</dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">School Year</dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ student.last_school_school_year }}</dd>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <aside class="block xl:col-span-4">
            <div class="sticky top-6 space-y-4">
              <div class="bg-white p-4 rounded border border-blue-600">
                <div class="sm:flex-auto text-right">
                  <h1 class="text-xl font-semibold text-blue-700">{{ student.first_name }} {{ student.middle_name }} {{ student.last_name }}</h1>
                  <h1 class="text-sm font-semibold text-blue-700 cursor-pointer hover:opacity-75">{{ student.grade_level.level }}</h1>
                  <select v-model="form.section" class="text-right w-1/2 h-8 p-2 text-xs placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Total">
                    <option value="" disabled>Select Section</option>
                    <option v-for="section in sections" :value="section.id">{{ section.section }}</option>
                  </select>
                </div>
                <div class="flow-root mt-6">
                  <ul role="list" class="-my-5 divide-y divide-gray-200">
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Entrance Fee</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.entrance) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.entrance" class="text-right" type="number"></p>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Miscellaneous</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.misc) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.misc" class="text-right" type="number"></p>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Tuition Fee</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.tuition) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.tuition" class="text-right" type="number"></p>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Books Fee</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.books) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.books" class="text-right" type="number"></p>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Hand Book</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.handbook) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.handbook" class="text-right" type="number"></p>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">School ID</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ {{ numberWithCommas(fees.id_fee) }}</p>
                        </div>
                      </div>
                      <div class="text-right">
                        <p class="text-sm text-blue-700 truncate">₱ <input disabled v-model="form.id_fee" class="text-right" type="number"></p>
                      </div>
                    </li>
                     <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Discount</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">₱ <input v-model="form.discount" type="number" class="text-right"/></p>
                        </div>
                      </div>
                    </li>
                    <div>
                        <p class="flex text-orange-500 text-sm p-1"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 mr-2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>Discount will automatically deducted when enrolled</p>
                    </div>
                    <li class="py-1">
                      <div class="flex items-center space-x-1 border-t-4 border-blue-700 pt-4">
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Whole Year Payment:</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 font-black truncate">₱ {{totalPayment(fees)}}</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="mt-6">
                  <div class="relative inline-block text-gray-700 w-full mb-2">
                      <input type="number" v-model="form.payment" class="text-right w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Total">
                      <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="71.668px" height="71.668px" viewBox="0 0 71.668 71.668" style="enable-background:new 0 0 71.668 71.668;" xml:space="preserve"><g><g><g><path d="M16.935,70.021c-2.158,0-3.926-0.748-5.252-2.225c-1.313-1.455-1.98-3.598-1.98-6.364V31.289H3.5     c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203v-3.667H3.5c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203     v-3.25c0-3.085,0.738-5.337,2.194-6.693c1.443-1.348,3.731-2.031,6.8-2.031h17.215c4.984,0,8.499,0.369,11.395,1.197     c3.022,0.839,5.014,2.35,6.715,3.856c2.019,1.787,3.576,4.008,4.627,6.6c0.043,0.105,0.084,0.213,0.123,0.321h9.396     c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-7.99c0.028,0.488,0.043,0.952,0.043,1.408c0,0.746-0.031,1.494-0.096,2.259     h8.043c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-9.656c-1.08,2.582-2.66,4.753-4.705,6.466     c-4.41,3.688-9.93,5.334-17.895,5.334h-11.79v18.252c0,2.799-0.683,4.965-2.029,6.438C20.733,69.267,18.998,70.021,16.935,70.021     z M3.499,27.289c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v31.643     c0,2.002,0.407,3.468,1.21,4.356c0.756,0.842,1.716,1.231,3.022,1.231c1.22,0,2.155-0.401,2.943-1.265     c0.825-0.903,1.244-2.389,1.244-4.414V41.589c0-0.828,0.672-1.5,1.5-1.5H35.91c7.211,0,12.137-1.43,15.97-4.635     c1.886-1.58,3.296-3.655,4.188-6.168c0.213-0.598,0.779-0.997,1.414-0.997h10.684c0.275,0,0.5-0.225,0.5-0.5s-0.225-0.5-0.5-0.5     h-9.721c-0.436,0-0.848-0.188-1.133-0.516s-0.414-0.764-0.354-1.193c0.174-1.237,0.259-2.398,0.259-3.55     c0-0.828-0.056-1.698-0.174-2.738c-0.049-0.425,0.087-0.85,0.371-1.169c0.284-0.318,0.69-0.501,1.119-0.501h9.631     c0.274,0,0.5-0.225,0.5-0.5s-0.226-0.5-0.5-0.5H57.686c-0.651,0-1.229-0.42-1.429-1.039l-0.075-0.234     c-0.099-0.313-0.195-0.624-0.316-0.922c-0.875-2.157-2.166-4.002-3.836-5.479c-1.701-1.508-3.221-2.57-5.538-3.214     c-2.627-0.751-5.888-1.085-10.581-1.085H18.696c-2.251,0-3.895,0.424-4.754,1.226c-0.812,0.756-1.24,2.312-1.24,4.499v4.75     c0,0.828-0.672,1.5-1.5,1.5H3.499c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v6.667     c0,0.828-0.672,1.5-1.5,1.5L3.499,27.289L3.499,27.289z M32.659,34.967H22.622c-0.828,0-1.5-0.672-1.5-1.5v-3.679     c0-0.828,0.672-1.5,1.5-1.5h22.767c0.604,0,1.151,0.364,1.385,0.924c0.231,0.559,0.105,1.203-0.32,1.633     c-1.352,1.361-3.072,2.375-5.117,3.015C38.979,34.596,36.06,34.967,32.659,34.967z M24.122,31.967h8.537     c2.588,0,4.841-0.228,6.717-0.679H24.122V31.967z M47.682,27.289h-25.06c-0.828,0-1.5-0.672-1.5-1.5v-6.667     c0-0.828,0.672-1.5,1.5-1.5h25.125c0.69,0,1.291,0.471,1.456,1.141c0.275,1.116,0.415,2.307,0.415,3.538     c0,1.39-0.165,2.696-0.491,3.885C48.948,26.836,48.355,27.289,47.682,27.289z M24.122,24.289h22.349     c0.098-0.627,0.147-1.292,0.147-1.988c0-0.575-0.037-1.137-0.111-1.679H24.122V24.289z M45.814,16.622H22.622     c-0.828,0-1.5-0.672-1.5-1.5v-3.897c0-0.828,0.672-1.5,1.5-1.5h10.037c6.754,0,11.224,1.205,13.664,3.684     c0.254,0.271,0.461,0.522,0.665,0.779c0.359,0.45,0.429,1.066,0.179,1.586C46.917,16.292,46.393,16.622,45.814,16.622z      M24.122,13.622h16.552c-2.027-0.595-4.707-0.897-8.015-0.897h-8.537V13.622z"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                      </div>
                  </div>
                  <button v-if="!isSending" @click="processPayment()" class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-500"> Enroll Student </button>
                  <button v-else disabled type="button" class="cursor-not-allowed w-full flex justify-center items-center rounded-lg px-4 py-2 text-white text-sm bg-blue-700 opacity-75">
                    <svg class="mr-3 h-5 w-5 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span class="font-medium"> Processing... </span>
                  </button>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
      <div id="printMe" hidden>
        <p style="text-align: center; margin-bottom: -10px; font-size: 1.5em; font-weight: bold;">Philippine Baptist Christian College of Mindanao, Inc.</p>
        <p style="text-align: center;">Fd. Rd. 2, Tibal-og, Sto Tomas Davao del Norte</p>
        <p style="text-align: right;"> Date: {{ dateNow() }}</p>
        <p>Payer: <span style="font-size: 1.5em; font-weight: bold; margin-left: 3px">{{ student.first_name }} {{ student.middle_name }} {{ student.last_name }}</span></p>
        <table style="font-family: arial, sans-serif; border-collapse: collapse; width: 100%;">
          <tr>
            <th></th>
            <th></th>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Entrance Fee</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.entrance }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Miscellaneous</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.misc }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Tuition Fee</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.tuition }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Books</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.books }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">Hand Book</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.handbook }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">School ID</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ this.form.id_fee }}</td>
          </tr>
          <tr>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px; font-size: 1rem; font-weight: bold;">Total</td>
            <td style="border: 1px solid #dddddd; text-align: left; padding: 8px;">₱ {{ form.payment }}</td>
          </tr>
        </table>
        <p style="font-size: 1.5em; font-weight: bold; margin-left: 3px">Amount in words:</p>
        <p>{{ form.payment | toWords }} pesos.</p>

        <p style="font-size: 1.5em; font-weight: bold; margin-left: 3px">Here is your SFAMS credentials</p>
        <p style="font-size: 1em; font-weight: bold; margin-left: 3px">Email: {{ student.email }}</p>
        <p style="font-size: 1em; font-weight: bold; margin-left: 3px">Password: sfams_password_{{ student.id }}</p>
      </div>
      <sweet-modal ref="studentlistmodal">
        This is <b>HTML</b>-<i>Content</i>.
        <br /><br />

        <iframe width="560" height="315" src="https://www.youtube.com/embed/4xgx4k83zzc" frameborder="0" allowfullscreen></iframe>
      </sweet-modal>
    </div>
</template>

<script>
  import _debounce from "lodash/debounce";

    export default {
        props: ['student', 'levels', 'fees', 'requirements', 'sections'],
        components: {

        },
        data() {
          return {
            isSending: false,
            isOpen: false,
            isOpenInformation: false,
            form: {
              section: '',
              requirements: null,
              student_id: null,
              fees: null,
              payment: 0,
              discount: 0,
              entrance: 0,
              misc: 0,
              tuition: 0,
              books: 0,
              handbook: 0,
              id_fee: 0,
              ECCD_checklist: true,
              birth_cert: true,
              card: true,
              coc: true,
              form_137: true,
              good_moral: true,
              picture: true,
            },
            feeValue: [
                'entrance',
                'tuition',
                'misc',
                'books',
                'handbook',
                'id_fee',
            ]
          }
        },
        watch: {
            'form.payment': _debounce(function(newVal, oldVal) {
                if(Number(newVal) > (Number(this.totalPaymentWoCommas(this.fees)))) {
                    this.form.payment = Number(this.totalPaymentWoCommas(this.fees))
                    this.separatePayments()
                } else {
                    this.separatePayments()
                }
            }, 500)
        },
        methods: {
            separatePayments() {
                let payment = Number(this.form.payment)
                const fees = this.feeValue
                fees.forEach(element => {
                    if(payment === 0) {
                        return
                    }
                    if(element === 'entrance') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.entrance = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.entrance = payment
                            payment = 0
                            return
                        }
                    }

                    if(element === 'misc') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.misc = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.misc = payment
                            payment = 0
                            return
                        }
                    }

                    if(element === 'tuition') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.tuition = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.tuition = payment
                            payment = 0
                            return
                        }
                    }

                    if(element === 'books') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.books = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.books = payment
                            payment = 0
                            return
                        }
                    }

                    if(element === 'handbook') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.handbook = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.handbook = payment
                            payment = 0
                            return
                        }
                    }

                    if(element === 'id_fee') {
                        if(payment >= Number(this.fees[element])) {
                            this.form.id_fee = this.fees[element]
                            payment = payment - this.fees[element]
                        } else {
                            this.form.id_fee = payment
                            payment = 0
                            return
                        }
                    }
                });
            },
            async print() {
                await this.$htmlToPaper('printMe');
            },
            openStudentModal() {
                this.discount = true
                this.$refs.studentlistmodal.open()
            },
            numberWithCommas(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            },
            toggleAccordion() {
                this.isOpen = !this.isOpen;
            },
            toggleAccordionInformation() {
                this.isOpenInformation = !this.isOpenInformation;
            },
            totalPayment(fees) {
                return this.numberWithCommas((parseInt(fees.entrance) + parseInt(fees.misc) + parseInt(fees.tuition) + parseInt(fees.books) + parseInt(fees.handbook) + parseInt(fees.id_fee)) - this.form.discount)
            },
            totalPaymentWoCommas(fees) {
                return (parseInt(fees.entrance) + parseInt(fees.misc) + parseInt(fees.tuition) + parseInt(fees.books) + parseInt(fees.handbook) + parseInt(fees.id_fee)) - this.form.discount
            },
            amountTotal() {
                return parseInt(this.form.entrance) + parseInt(this.form.misc) + parseInt(this.form.tuition) + parseInt(this.form.books) + parseInt(this.form.handbook) + parseInt(this.form.id_fee);
            },
            async processPayment() {
                this.isSending = true
                if(this.form.section !== '') {
                this.form.requirements = this.requirements
                this.form.student_id = this.student.id
                this.form.fees = this.fees
                this.print()
                await axios.post('/enrollment/new-student', this.form)
                .then(response => {
                    this.isSending = false
                })
                window.location.href = '/enrollment-applications';
                } else {
                this.$swal.fire({
                    icon: 'Error',
                    title: 'Please select section',
                    text: 'Select before registering a student.',
                })
                this.isSending = false
                }
            },
            dateNow() {
                const date = new Date();

                let day = date.getDate();
                let month = date.getMonth() + 1;
                let year = date.getFullYear();

                return `${day}-${month}-${year}`;
            }
        },
        mounted() {

        }
    }
</script>

<style>
  .sweet-action-close {
    margin: auto;
    padding: 9px;
  }
  .sweet-action-close:hover {
    background-color: red !important;
  }
</style>
