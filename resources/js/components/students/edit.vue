<template>
    <div class="mt-5 md:col-span-2 md:mt-0 bg-blue-100">
      <form @submit.prevent="updateStudent()">
        <div class="overflow-hidden shadow sm:rounded-md">
          <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-2">
                <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">LRN</p>
                <input required v-model="form.lrn" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>
            </div>
            <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Personal Details</p>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-2">
                <label for="first-name" class="block text-sm font-medium text-gray-700">First name</label>
                <input required v-model="form.first_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="middle-name" class="block text-sm font-medium text-gray-700">Middle name</label>
                <input required v-model="form.middle_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label class="block text-sm font-medium text-gray-700">Last name</label>
                <input required v-model="form.last_name" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="birth-date" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input required v-model="form.birth_date" type="date" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Birth Place</label>
                <input required v-model="form.birth_place" type="texr" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>

              <div class="col-span-6 sm:col-span-2">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Gender</label>
                <select required v-model="form.gender" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="1">Male</option>
                    <option value="0">Female</option>
                </select>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <masked-input mask="\+\63 (111) 111-1111" v-model="form.phone" placeholder="Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
              </div>

              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">E-Mail</label>
                <input required type="email" v-model="form.email" placeholder="Email" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500">
              </div>
            </div>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Current Address</p>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Purok/Street</label>
                <input required v-model="form.purok_street" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Barangay</label>
                <input required v-model="form.barangay" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">City</label>
                <input required v-model="form.city" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Province</label>
                <input required v-model="form.province" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
              </div>
            </div>
          </div>
          <div class="px-4 py-5 sm:p-6">
            <p class="text-centered text-2xl text-gray-900 pt-2 font-bold">Contact Person</p>
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Name</label>
                <input required v-model="form.contact_person" type="text" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" placeholder="Full Name">
              </div>
              <div class="col-span-6 sm:col-span-3">
                <label for="birth-place" class="block text-sm font-medium text-gray-700">Mobile Number</label>
                <masked-input mask="\+\63 (111) 111-1111" v-model="form.contact_person_number" placeholder="Phone Number" @input="rawVal = arguments[1]" class="w-full h-10 pl-6 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500"/>
              </div>
            </div>
          </div>
          <div class="px-4 py-3 text-right sm:px-6">
            <a :href="`/student/${student.id}`" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Back</a>
            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save</button>
          </div>
        </div>
      </form>
    </div>
</template>

<script>
  export default {
    props: ['student'],
    data() {
      return {
        form: {}
      }
    },
    watch: {
      student: function(newVal, oldVal) { // watch it
        console.log('Prop changed: ', newVal, ' | was: ', oldVal)
      }
    },
    methods: {
      async updateStudent() {
        await axios.put(`/student/${this.student.id}/update`, this.form)
        .then(response => {
          this.$swal.fire({
              icon: 'Success',
              title: 'Updated Successfully',
              text: '',
          }).then((result) => {
              window.location.href = `/student/${this.student.id}`
          })
        });
      }
    },
    mounted() {
      this.form = this.student
    }
  }
</script>
