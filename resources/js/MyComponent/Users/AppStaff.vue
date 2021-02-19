

<template>
    <div>
        <div class="intro-y flex flex-col sm:flex-row items-center mt-0">
            <h2 class="text-lg font-medium mr-auto">
                {{pagetitle}}
            </h2>
        </div>
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="javascript:;" @click="whichToShow('dataTable')" class="button px-2 box text-gray-700 dark:text-gray-300 shadow-md mr-2">Staff Member</a>
            <a href="javascript:;" @click="whichToShow('registration')" class="button text-white bg-theme-1 shadow-md mr-2">Registration</a>

            <div v-show="showSearch" class="hidden md:block mx-auto text-gray-600">Showing {{ initNo + 1 }} to {{ currentNo }} of {{ findingLength }} entries</div>
            <!-- <search-table v-show="showSearch" :angs="angs" :dividerData="dividerData"></search-table> -->

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0" v-show="showSearch">
                <div class="w-56 relative text-gray-700 dark:text-gray-300">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" @input="searchDataInTable" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 gap-1 lg:mt-5" v-show="toggler.registration">
             <!-- BEGIN: Input -->
                <div class="intro-y box">
                    <div class="p-5" id="input">
                        <div class="preview">
                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="relative rounded-l w-full text-center h-full flex items-center justify-left bg-blue-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Details Of Staff</div>
                                </div>
                            </div>


                            <div class="intro-y box px-5 pt-2 mt-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">First Name</div>
                                        <input type="text" v-model="form.first_name" class="input pl-24 w-full border" placeholder="First Name">

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Middle Name</div>
                                        <input type="text" v-model="form.middle_name" class="input pl-28 w-full border" placeholder="Middle Name">

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Last Name</div>
                                        <input type="text" v-model="form.last_name" class="input pl-24 w-full border" placeholder="Last Name">

                                    </div>
                                </div>
                            </div>

                            <div class="intro-y box px-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Reg Num</div>
                                        <input type="text" v-model="form.reg_no" class="input pl-24 w-full border" placeholder="Reg Num">
                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Joined date</div>
                                        <input type="date" v-model="form.join_date" class="input pl-24 w-full border" placeholder="Joined date">

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Date Of Birth</div>
                                        <input type="date" v-model="form.date_of_birth" class="input pl-28 w-full border" placeholder="Date Of Birth">
                                    </div>
                                </div>
                            </div>
                            <div class="intro-y box px-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">

                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <v-select label="display_name" v-model="form.roles" :options="roles" :reduce="role => role.id" :filterable="true" multiple class="input w-full border mt-2" ></v-select>
                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <select class="input w-full border" v-model="form.designation" >
                                            <option value="" selected>Select Staff Designation</option>
                                            <option v-for="(desinate,ind) in designations" :key="ind" :value="desinate.id">{{ desinate.title }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="intro-y box px-5 ">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="inherit rounded-l w-full text-center h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Parents Details For Staff</div>
                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Mother Name</div>
                                        <input type="text" v-model="form.mother_name" class="input pl-28  w-full border" placeholder="Mother Name">

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Father Name</div>
                                        <input type="text" v-model="form.father_name" class="input pl-28 w-full border" placeholder="Father Name">

                                    </div>
                                </div>
                            </div>

                            <div class="intro-y box px-5 ">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <select class="input w-full border" v-model="form.gender" required >
                                            <option value="" selected>Select Gender</option>
                                            <option value="Male" >Male</option>
                                            <option value="Female" >Female</option>
                                            <option value="Other" >Other</option>
                                        </select>
                                    </div>

                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                       <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <select class="input w-full border" v-model="form.blood_group" required >
                                            <option value="" selected>Select Blood Group</option>
                                            <option value="O" >O</option>
                                            <option value="O-" >O-</option>
                                            <option value="A" >A</option>
                                            <option value="A-" >A-</option>
                                            <option value="B" >B</option>
                                            <option value="B-" >B-</option>
                                            <option value="AB" >AB</option>
                                            <option value="AB-" >AB-</option>

                                        </select>
                                    </div>
                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Nationality</div>
                                        <input type="text" v-model="form.nationality" class="input pl-24 w-full border" placeholder="Nationality">

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-26 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Mother Tongue</div>
                                        <input type="text" v-model="form.mother_tongue" class="input pl-28 w-full border" placeholder="Mother Tongue">

                                    </div>
                                </div>
                            </div>
                            <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed" ></div>

                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="relative rounded-l w-full text-center h-full flex items-center justify-left bg-blue-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contacts & Address & Email</div>
                                </div>
                            </div>
                            <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed"></div>


                            <div class="intro-y box px-5 pt-2 mt-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Email</div>
                                        <input type="email" v-model="form.email" class="input pl-24 w-full border" placeholder="Email" required>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Home Contact</div>
                                        <input type="text" v-model="form.home_phone" class="input pl-28 w-full border" placeholder="Home Contact" required>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contact 1</div>
                                        <input type="text" v-model="form.mobile_1" class="input pl-24 w-full border" placeholder="Contact 1" required>
                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Contact 2</div>
                                        <input type="text" v-model="form.mobile_2" class="input pl-24 w-full border" placeholder="Contact 2">
                                    </div>
                                </div>
                            </div>

                            <div class="intro-y box px-5 pt-2 mt-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Address</div>
                                        <input type="text" v-model="form.address" class="input pl-24 w-full border" placeholder="Address" required>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">State</div>
                                        <input type="text" v-model="form.state" class="input pl-28 w-full border" placeholder="State" required>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Country</div>
                                        <input type="text" v-model="form.country" class="input pl-24 w-full border" placeholder="Country" required>
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                    <div class="relative rounded-l w-full text-center h-full flex items-center justify-left bg-blue-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Qualification & Experience</div>
                                </div>
                            </div>
                            <div class="w-full border-t border-bold border-gray-200 dark:border-dark-5 border-dashed"></div>

                            <div class="intro-y box px-5 pt-2 mt-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-20 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Qualification</div>
                                        <input type="text" v-model="form.qualification" class="input pl-24 w-full border" placeholder="Qualification" required>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <div class="absolute rounded-l w-24 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">Experience</div>
                                        <input type="text" v-model="form.experience" class="input pl-28 w-full border" placeholder="Experience" required>

                                    </div>
                                </div>
                            </div>

                            <div class="intro-y box px-5 pt-2 mt-5">
                                <div class="flex flex-col lg:flex-row border-b border-gray-200 dark:border-dark-5 pb-5 -mx-5">
                                     <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <textarea class="input w-full border" v-model="form.experience_info" name="experience_info" cols="30" rows="4" placeholder="experience information"></textarea>

                                    </div>
                                    <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                       <div class="mt-6 lg:mt-0 relative flex-1 flex items-center px-5 border-t lg:border-0 border-gray-200 dark:border-dark-5 lg:pt-0">
                                        <textarea class="input w-full border" v-model="form.other_info" name="other_info" cols="30" rows="4" placeholder="Other information"></textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full border-t border-gray-200 dark:border-dark-5 mt-5"></div>
                        </div>


                        <div class="p-5 border-t flex">
                            <button type="button" v-show="!editmode" :disabled="isDisabled" @click="cancelDetail" class="button button--sm border block text-dark">Reset Form</button>
                            <button type="button" v-show="editmode" :disabled="isDisabled" @click="cancelUpdate" class="button button--sm border block  text-dark">Cancel Update</button>
                            <button type="button" v-show="!editmode" :disabled="isDisabled" @click="saveDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Submit</button>
                            <button v-show="editmode" type="button" :disabled="isDisabled" @click="updateDetail" class="button button--sm border text-white dark:border-dark-5 bg-theme-1 dark:text-gray-300 ml-auto">Update changes</button>
                        </div>

                    </div>
                </div>
                <!-- END: Input -->
        </div>
        <div class="grid grid-cols-1 gap-1" v-show="toggler.dataTable">
            <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5">
                    <div class="overflow-x-auto">

                     <table class="table">
                         <thead>
                             <tr>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">No</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Staff No</th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"> Name </th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Contact </th>
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Gender </th>
                                 <!-- <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Designation </th> -->
                                 <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Status </th>
                                 <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             <tr class="hover:bg-gray-200" v-for="(van,index) in dataDisplaying" :key="index">
                                 <td class="border" >{{index+1 }}</td>
                                 <td class="border" >{{ van.reg_no }}</td>
                                 <td class="border" >{{ van.first_name }} {{ van.last_name }}</td>
                                 <td class="border" v-if="van.home_phone">{{ van.home_phone }}</td>
                                 <td class="border" v-else >{{ van.mobile_1 }}</td>
                                 <td class="border" >{{ van.gender }}</td>
                                 <!-- <td class="border" >{{ van.designations }} </td> -->
                                 <td class="border" >
                                     {{ van.status }}
                                        <!-- <select class="inputtable inputtable--sm w-full border border--sm" >
                                            <option :value="van.status" selected disabled >{{ van.status }}</option>
                                            <option value="active" >Active</option>
                                            <option value="not-active" >Not Active</option>
                                        </select> -->
                                      </td>
                                 <td class="border flex items-center">
                                    <edit-button v-if="isToEdit"  @editBtn="actionEdit(index,van)" ></edit-button>
                                    <delete-button v-if="isToDelete"  @deleteBtn="actionDelete(index,van)" ></delete-button>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                        <div class="intro-y  flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3" >


                            <ul class="pagination items-center " v-if="last => 1">
                                <li v-show="isValueOne">
                                    <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(first)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left w-4 h-4"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg> </a>
                                </li>
                                <li v-show="isValueOne">
                                    <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(previous)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4"><polyline points="15 18 9 12 15 6"></polyline></svg> </a>
                                </li>
                                <li> <a class="pagination__link" v-show="isValueOne"  href="javascript:;" @click.prevent="moveThirdToFirst()">...</a> </li>
                                <template v-if="last >= 3">
                                <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
                                <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
                                <li> <a class="pagination__link"  href="javascript:;" @click.prevent="changeFunctionValue(valueThree)" >{{valueThree}}</a> </li>
                                </template>
                                <template v-if="last === 2">
                                <li> <a class="pagination__link"  href="javascript:;"  @click="changeFunctionValue(valueOne)">{{valueOne}}</a> </li>
                                <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueTwo)" >{{valueTwo}}</a> </li>
                                </template>
                                <template v-if="last === 1">
                                <li > <a class="pagination__link pagination__link--active"  href="javascript:;" @click.prevent="changeFunctionValue(valueOne)" >{{valueOne}}</a> </li>
                                </template>

                                <li> <a class="pagination__link" v-show="isValueOne" href="javascript:;"  @click.prevent="moveFirstToThird()" >...</a> </li>
                                <li v-show="isValueOne">
                                    <a class="pagination__link" href="javascript:;"  @click.prevent="changeFunctionValue(next)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4"><polyline points="9 18 15 12 9 6"></polyline></svg> </a>
                                </li>
                                <li v-show="isValueOne">
                                    <a class="pagination__link" href="javascript:;" @click.prevent="changeFunctionValue(last)" > <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-right w-4 h-4"><polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline></svg> </a>
                                </li>
                            </ul>
                            <select v-model="dividerData"  @change="dividerDataChange" class="input w-30 border" aria-label="Page Size" title="Page Size"><option value="2">2</option><option value="5">5</option><option value="10">10</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option></select>
                        </div>
                    </div>

                </div>
                <!-- END: Daily Sales -->
        </div>

    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import BtnButton from '@/Buttons/BtnButton'
    import OverlapModal from '@/Customers/OverlapModal'
    // import TablePagination from '@/Customers/TablePagination'
    // import SearchTable from '@/Customers/SearchTable'

    import tableCaseMixin from '@/Mixins/tableCaseMixin'
// import 'vue-select/dist/vue-select.css';
    import DeleteButton from '@/Buttons/DeleteButton'
    import EditButton from '@/Buttons/EditButton'

    export default {
        props:['vans','urls','pagetitle','option'],
        components: {
            JetButton,
            BtnButton,
            OverlapModal,
            DeleteButton,
            EditButton,
            // TablePagination,
            // SearchTable


        },

        mixins:[tableCaseMixin],
        data() {
            return {
                angs : this.vans['staffs'],
                vangs : this.vans['staffs'],
                roles: this.vans['roles'],
                currentData:[],
                designations:this.vans['designation'],
                submitMode: false,
                editmode:false,



                optionValue:this.option,

                toggler:{
                    registration:false,
                    dataTable:false,

                },

                form: new Form({
                    first_name:"",
                    middle_name:"",
                    last_name:"",

                    join_date:"",
                    reg_no:"",
                    father_name:"",
                    mother_name:"",
                    date_of_birth:"",
                    gender:"",
                    blood_group:"",
                    designation:"",
                    roles:[],

                    nationality:"",
                    state:"",
                    country:"",
                    temp_address:"",
                    temp_state:"",
                    temp_country:"",
                    home_phone:"",
                    address:"",

                    mobile_1:"",
                    mobile_2:"",
                    mother_tongue:"",
                    email:"",
                    qualification:"",
                    experience:"",
                    experience_info:"",
                    other_info:"",
                    staff_image:"",
                    status:"active",
                }),

                isAngShow:[],

                indexValue:Number,
                id:Number,
                showSearch:true,


            }
        },

        methods: {
            saveDetail(){
                    this.$Progress.start();
                    this.form
                        .post(`/users/${this.urls}`)
                        .then((data) => {
                            this.angs.push(data.data);
                            this.cancelUpdate();
                            Toast.fire({
                                icon: "success",
                                title: `${this.pagetitle} created successfully`
                            });
                            this.$Progress.finish();
                        })
                        .catch(() => {
                            Toast.fire({
                                icon: "error",
                                title: "van did not created successfully"
                            });
                        });
            },
            updateDetail(){
                this.$Progress.start();
                this.form.put(`/users/${this.urls}/${this.id}`)
                    .then((data) => {
                        this.angs.splice(this.indexValue, 1, data.data);
                        this.cancelUpdate();
                        // this.angs.splice(index,1);
                        Toast.fire({
                            icon: "success",
                            title: `${this.pagetitle} Updated successfully`
                        });
                        this.$Progress.finish();
                    }).catch(() => {
                        this.$Progress.fail();
                        Toast.fire({
                            icon: "error",
                            title: `${this.pagetitle} did not Updated successfully`
                        });
                    });
            },
            actionDelete(index,van){

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then(result => {
                        if (result.value) {
                            this.form.delete(`/users/${this.urls}/${van.id}`)
                                .then((data) => {
                                    let tr = this.angs.indexOf(van);
                                    Swal.fire("Deleted!", `${this.pagetitle} has been deleted.`, "success");
                                    this.angs.splice(tr,1);
                                    this.spinning=!this.spinning;

                                }).catch(() => {
                                    Swal.fire("Something Wrong Happened !", "Not Deleted Please try Again !", "error");
                                });
                        }else{

                        }
                    });
            },
            cancelDetail(){
              this.cancelUpdate();
              Toast.fire({ icon: "success", title: "reseted successfully" });
            },
            cancelUpdate(){
              this.form.reset();
              this.whichToShow("dataTable")
              this.id = null;
              this.indexValue= null;
              this.dataHolder={};
              this.editmode = false;
            },
            actionEdit(index,van){
              this.editmode = true;
              this.indexValue= this.angs.indexOf(van);
              this.whichToShow("registration")
              this.id= van.id;
                this.form.reset();
                this.form.fill(van);
                this.form.roles=van.user.roles;
            },
            whichToShow(value){
                this.clearToggler();
                this.form.reset();
                if(value ==="dataTable"){
                    this.showSearch = true;
                    return this.toggler.dataTable = true;
                }
                if(value ==="registration"){
                     this.showSearch = false;
                    return this.toggler.registration = true;
                }

            },
            clearToggler(){
                this.toggler.registration = false;
                this.toggler.dataTable = false;
            },
        },

        computed: {
          isDisabled() {
            if (!this.form.first_name || !this.form.last_name || !this.form.email || !this.form.mobile_1) {
              return !this.submitMode;
            }
          },
          isToDelete() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.delete;
            }
            return this.optionValue.delete;
          },
          isToEdit() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.edit;
            }
            return this.optionValue.edit;
          },

          isToShow() {
            if (this.$page.user.role === "superadministrator") {
              return !this.optionValue.show;
            }
            return this.optionValue.show;
          },

          findingLength(){
              if(this.angs.length){
                  return this.angs.length;
              }else
                return 0;
          },
          dataDisplaying(){
              return this.angs.slice(this.initNo,this.currentNo);
          },

        },
        mounted() {
            // this.isAngShow = this.angs.slice(0,this.dividerData);

        },



        created(){
           this.whichToShow("dataTable")
           appBus.listen('paginated',this.dataToDisplay)
           appBus.listen('search-filter',this.searchFilterData)
           appBus.listen('data-search-show',this.dataToDisplay)



        }

}
</script>

<style lang="stylus" scoped>

</style>
