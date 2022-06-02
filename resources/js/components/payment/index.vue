<template>
    <div class="bg-blue-100 min-h-screen">
      <div class="py-6">
        <div class="sm:flex sm:items-center px-6">
            <div class="sm:flex-auto">
                <h1 class="text-2xl font-semibold text-gray-900">Process Payment</h1>
                <p class="mt-2 text-sm text-gray-700">Process payment (please be careful to avoid delay)</p>
            </div>
        </div>
        <div class="mt-4 max-w-3xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-12 lg:gap-8">
          <main class="lg:col-span-12 xl:col-span-8">
            <div class="px-4 sm:px-6 lg:px-8">
              <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                  <h1 class="text-xl font-semibold text-blue-700">Students List</h1>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                  <div class="col-span-8 sm:col-span-4 lg:col-span-2">
                    <div class="relative inline-block text-gray-700 w-full">
                        <input type="text" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Search Student">
                        <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2 text-blue-500"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mt-8 flex flex-col">
                <div class="-my-2 -mx-4 sm:-mx-6 lg:-mx-8">
                  <div class="inline-block min-w-full py-2 align-middle">
                    <div class="shadow-sm ring-1 ring-black ring-opacity-5">
                      <table class="min-w-full border-separate" style="border-spacing: 0">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:pl-6 lg:pl-8">Name</th>
                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter sm:table-cell">Previous Balance</th>
                            <th scope="col" class="sticky top-0 z-10 hidden border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter lg:table-cell">Current Bill</th>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 px-3 py-3.5 text-left text-sm font-semibold text-gray-900 backdrop-blur backdrop-filter">Total</th>
                            <th scope="col" class="sticky top-0 z-10 border-b border-gray-300 bg-gray-50 bg-opacity-75 py-3.5 pr-4 pl-3 backdrop-blur backdrop-filter sm:pr-6 lg:pr-8">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                          <tr>
                            <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-bold text-blue-700 sm:pl-6 lg:pl-8">Lindsay Walton</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td>
                            <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                              <p class="text-blue-700 hover:text-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-bold text-blue-700 sm:pl-6 lg:pl-8">Lindsay Walton</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td>
                            <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                              <p class="text-blue-700 hover:text-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </p>
                            </td>
                          </tr>
                          <tr>
                            <td class="whitespace-nowrap border-b border-gray-200 py-4 pl-4 pr-3 text-sm font-bold text-blue-700 sm:pl-6 lg:pl-8">Lindsay Walton</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden sm:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500 hidden lg:table-cell">$3,509.00</td>
                            <td class="whitespace-nowrap border-b border-gray-200 px-3 py-4 text-sm text-gray-500">Member</td>
                            <td class="relative whitespace-nowrap border-b border-gray-200 py-4 pr-4 pl-3 text-right text-sm font-medium sm:pr-6 lg:pr-8">
                              <p class="text-blue-700 hover:text-blue-500 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                              </p>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </main>
          <aside class="hidden xl:block xl:col-span-4">
            <div class="sticky top-6 space-y-4">
              <div class="bg-white p-4 rounded border border-blue-600">
                <div class="sm:flex-auto text-right">
                  <h1 class="text-xl font-semibold text-blue-700">Lindsay Walton</h1>
                  <p class="mt-2 text-sm text-gray-700">Grade 1 - A</p>
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
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
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
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
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
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1">
                        <div class="flex-shrink-0">
                          <p class="text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"/><polyline points="18 17 13 12 18 7"/></svg>
                          </p>
                        </div>
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Back Account</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
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
                          <p class="text-sm font-medium text-gray-900 truncate">Photocopy</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
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
                          <p class="text-sm font-medium text-gray-900 truncate">Others</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 truncate">$3,509.00</p>
                        </div>
                      </div>
                    </li>
                    <li class="py-1">
                      <div class="flex items-center space-x-1 border-t-4 border-blue-700 pt-4">
                        <div class="flex-1 min-w-0">
                          <p class="text-sm font-medium text-gray-900 truncate">Total:</p>
                        </div>
                        <div>
                          <p class="text-sm text-blue-700 text-2xl font-black truncate">$3,509.00</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="mt-6">
                  <div class="relative inline-block text-gray-700 w-full mb-2">
                      <input type="text" class="w-full h-10 pl-9 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Enter Amount">
                      <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="71.668px" height="71.668px" viewBox="0 0 71.668 71.668" style="enable-background:new 0 0 71.668 71.668;" xml:space="preserve"><g><g><g><path d="M16.935,70.021c-2.158,0-3.926-0.748-5.252-2.225c-1.313-1.455-1.98-3.598-1.98-6.364V31.289H3.5     c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203v-3.667H3.5c-1.93,0-3.5-1.57-3.5-3.5c0-1.93,1.57-3.5,3.5-3.5h6.203     v-3.25c0-3.085,0.738-5.337,2.194-6.693c1.443-1.348,3.731-2.031,6.8-2.031h17.215c4.984,0,8.499,0.369,11.395,1.197     c3.022,0.839,5.014,2.35,6.715,3.856c2.019,1.787,3.576,4.008,4.627,6.6c0.043,0.105,0.084,0.213,0.123,0.321h9.396     c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-7.99c0.028,0.488,0.043,0.952,0.043,1.408c0,0.746-0.031,1.494-0.096,2.259     h8.043c1.93,0,3.5,1.57,3.5,3.5c0,1.93-1.57,3.5-3.5,3.5h-9.656c-1.08,2.582-2.66,4.753-4.705,6.466     c-4.41,3.688-9.93,5.334-17.895,5.334h-11.79v18.252c0,2.799-0.683,4.965-2.029,6.438C20.733,69.267,18.998,70.021,16.935,70.021     z M3.499,27.289c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v31.643     c0,2.002,0.407,3.468,1.21,4.356c0.756,0.842,1.716,1.231,3.022,1.231c1.22,0,2.155-0.401,2.943-1.265     c0.825-0.903,1.244-2.389,1.244-4.414V41.589c0-0.828,0.672-1.5,1.5-1.5H35.91c7.211,0,12.137-1.43,15.97-4.635     c1.886-1.58,3.296-3.655,4.188-6.168c0.213-0.598,0.779-0.997,1.414-0.997h10.684c0.275,0,0.5-0.225,0.5-0.5s-0.225-0.5-0.5-0.5     h-9.721c-0.436,0-0.848-0.188-1.133-0.516s-0.414-0.764-0.354-1.193c0.174-1.237,0.259-2.398,0.259-3.55     c0-0.828-0.056-1.698-0.174-2.738c-0.049-0.425,0.087-0.85,0.371-1.169c0.284-0.318,0.69-0.501,1.119-0.501h9.631     c0.274,0,0.5-0.225,0.5-0.5s-0.226-0.5-0.5-0.5H57.686c-0.651,0-1.229-0.42-1.429-1.039l-0.075-0.234     c-0.099-0.313-0.195-0.624-0.316-0.922c-0.875-2.157-2.166-4.002-3.836-5.479c-1.701-1.508-3.221-2.57-5.538-3.214     c-2.627-0.751-5.888-1.085-10.581-1.085H18.696c-2.251,0-3.895,0.424-4.754,1.226c-0.812,0.756-1.24,2.312-1.24,4.499v4.75     c0,0.828-0.672,1.5-1.5,1.5H3.499c-0.275,0-0.5,0.225-0.5,0.5s0.225,0.5,0.5,0.5h7.703c0.828,0,1.5,0.672,1.5,1.5v6.667     c0,0.828-0.672,1.5-1.5,1.5L3.499,27.289L3.499,27.289z M32.659,34.967H22.622c-0.828,0-1.5-0.672-1.5-1.5v-3.679     c0-0.828,0.672-1.5,1.5-1.5h22.767c0.604,0,1.151,0.364,1.385,0.924c0.231,0.559,0.105,1.203-0.32,1.633     c-1.352,1.361-3.072,2.375-5.117,3.015C38.979,34.596,36.06,34.967,32.659,34.967z M24.122,31.967h8.537     c2.588,0,4.841-0.228,6.717-0.679H24.122V31.967z M47.682,27.289h-25.06c-0.828,0-1.5-0.672-1.5-1.5v-6.667     c0-0.828,0.672-1.5,1.5-1.5h25.125c0.69,0,1.291,0.471,1.456,1.141c0.275,1.116,0.415,2.307,0.415,3.538     c0,1.39-0.165,2.696-0.491,3.885C48.948,26.836,48.355,27.289,47.682,27.289z M24.122,24.289h22.349     c0.098-0.627,0.147-1.292,0.147-1.988c0-0.575-0.037-1.137-0.111-1.679H24.122V24.289z M45.814,16.622H22.622     c-0.828,0-1.5-0.672-1.5-1.5v-3.897c0-0.828,0.672-1.5,1.5-1.5h10.037c6.754,0,11.224,1.205,13.664,3.684     c0.254,0.271,0.461,0.522,0.665,0.779c0.359,0.45,0.429,1.066,0.179,1.586C46.917,16.292,46.393,16.622,45.814,16.622z      M24.122,13.622h16.552c-2.027-0.595-4.707-0.897-8.015-0.897h-8.537V13.622z"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                      </div>
                  </div>
                  <button class="w-full flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-500"> Process Payment </button>
                </div>
              </div>
            </div>
          </aside>
        </div>
      </div>
      <sweet-modal ref="studentlistmodal">
        This is <b>HTML</b>-<i>Content</i>.
        <br /><br />

        <iframe width="560" height="315" src="https://www.youtube.com/embed/4xgx4k83zzc" frameborder="0" allowfullscreen></iframe>
      </sweet-modal>
    </div>
</template>

<script>
    export default {
        methods: {
          openStudentModal() {
            this.$refs.studentlistmodal.open()
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