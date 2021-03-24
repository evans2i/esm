<template>
	<div class="mobile-menu md:hidden">
        <div class="mobile-menu-bar">
            <a href="" class="flex mr-auto">
                <img alt="Shoool" class="w-6" src="/dist/images/logo.svg">
            </a>
            <a href="javascript:;" id="mobile-menu-toggler">
                <i  class="feather icon-bar-chart-2 w-8 h-8 text-white transform -rotate-90"></i>

                <!-- @click="display = !display" -->
              <!--   <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1 w-8 h-8 text-white transform -rotate-90"><line x1="21" y1="10" x2="3" y2="10"></line><line x1="21" y1="6" x2="3" y2="6"></line><line x1="21" y1="14" x2="3" y2="14"></line><line x1="21" y1="18" x2="3" y2="18"></line></svg> -->
            </a>
        </div>
        <ul class="border-t border-theme-24 py-5 hidden" style="display: none;">
            <template  v-if="$role.IsSuperadministrator()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Dashboard </div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsSuperadministrator()">
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i class="feather icon-layout"></i> </div>
                        <div class="menu__title"> Settings <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i class="feather icon-activity"></i> </div>
                                <div class="menu__title"> Academic Level <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <inertia-link href="/manage/faculties"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Classes/Faculty/Streams </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/semesters"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Semisters/Sections </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/studentBatches"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Student Batches </div>
                                    </inertia-link>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i class="feather icon-activity"></i> </div>
                                <div class="menu__title"> Subjects & Grading<i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <inertia-link href="/manage/gradingTypes"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Grading </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/subjects"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Subjects</div>
                                    </inertia-link>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i class="feather icon-activity"></i> </div>
                                <div class="menu__title"> Statuses Settings<i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <inertia-link href="/manage/studentStatuses"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Student Status </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/attendanceStatuses"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Attendance Status </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/bookStatuses"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> BookS Statuses </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/bedStatuses"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Bed Statuses </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/customerStatuses"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Customer Statuses </div>
                                    </inertia-link>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:;" class="menu">
                                <div class="menu__icon"> <i class="feather icon-activity"></i> </div>
                                <div class="menu__title"> Time Settings<i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                            </a>
                            <ul class="">
                                <li>
                                    <inertia-link href="/manage/days"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                        <div class="menu__title"> Days </div>
                                    </inertia-link>
                                </li>
                                <li>
                                    <inertia-link href="/manage/months"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Months </div>
                                    </inertia-link>
                                </li>
                                <li>

                                    <inertia-link href="/manage/years"  class="menu" >
                                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                                        <div class="menu__title"> Years </div>
                                    </inertia-link>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <inertia-link href="/manage/paymentMethods"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="menu__title"> Payment Method </div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                        <div class="menu__title"> Users <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/users/staffs"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="menu__title"> Staff </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/users/students"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="menu__title"> Students </div>
                            </inertia-link>
                        </li>
                        <li>

                            <inertia-link href="/users/employees"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                                <div class="menu__title">Employee</div>
                            </inertia-link>
                        </li>

                        <li>
                            <inertia-link href="/users/users"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                                <div class="menu__title"> Other Staff</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/staffDesignations"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-table"></i> </div>
                                <div class="menu__title"> Staff Designation </div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                        <div class="menu__title"> Accademic <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/assignFaculties"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="menu__title">Assign Faculty/Class</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/assignSubjects"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="menu__title">Assign Subject</div>
                            </inertia-link>
                        </li>

                        <li>
                            <inertia-link href="/accademic/examSchedules"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title">Examination Schedule</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accademic/examMarkLedger"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title">Examination Results</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/exams"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title"> Examination Types</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accademic/examResult"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title"> Result Examination </div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                        <div class="menu__title"> Library <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                       <li>
                        <inertia-link href="/library/studentLibrary/student"  class="menu" >
                            <div class="menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="menu__title">Students</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/library/studentLibrary/staff"  class="menu" >
                            <div class="menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="menu__title">Staff</div>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/library/books"  class="menu" >
                            <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="menu__title">Issue Books</div>
                        </inertia-link>
                    </li>


                    <li>
                        <inertia-link href="/library/bookMasters"  class="menu" >
                            <div class="menu__icon"> <i class="feather icon-book"></i></div>
                            <div class="menu__title">All Books</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/manage/bookCategories"  class="menu" >
                            <div class="menu__icon"> <i class="feather icon-book"></i></div>
                            <div class="menu__title">Books Category</div>
                        </inertia-link>
                    </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="menu__title"> Fee Settups <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/accountant/quickReceiveFee"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Quick Receive Fee</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accountant/feeCollections"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Collect Fee</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accountant/feeMasters"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Add Fee</div>
                            </inertia-link>
                        </li>
                        <li >
                            <inertia-link href="/manage/feeHeads"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-calculator"></i></div>
                                <div class="menu__title">Fee Head</div>
                            </inertia-link>
                        </li>

                        <!-- <li>
                            <inertia-link href="/accademic/examSchedules"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Balance Fee</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accademic/examSchedules"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Received Detail</div>
                            </inertia-link>
                        </li> -->

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="menu__title"> HOSTELS <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/accountant/quickReceiveFee"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Quick Receive Fee</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accountant/feeCollections"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Collect Fee</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accountant/feeMasters"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title"></div>
                            </inertia-link>
                        </li>
                        <li >
                            <inertia-link href="/manage/roomTypes"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-calculator"></i></div>
                                <div class="menu__title">Room Type</div>
                            </inertia-link>
                        </li>


                    </ul>
                </li>


            </template>
            <template v-if="$role.IsLibrarian()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Home </div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsLibrarian()">
                    <inertia-link href="/library/studentLibrary/student"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="menu__title">Students</div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsLibrarian()">
                    <inertia-link href="/library/studentLibrary/staff"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="menu__title">Staff</div>
                    </inertia-link>
                </li>

                <li v-if="$role.IsLibrarian()" >
                    <inertia-link href="/library/books"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="menu__title">Issue Books</div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsLibrarian()" >
                    <inertia-link href="/library/bookMasters"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="menu__title">All Books</div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsLibrarian()">
                    <inertia-link href="/manage/bookCategories"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="menu__title">Books Category</div>
                    </inertia-link>
                </li>

            </template>
            <template v-if="$role.IsStaff()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Home </div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/users/students"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="menu__title"> Students </div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/accademic/examMarkLedger"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="menu__title">Examination Results</div>
                    </inertia-link>
                </li>
            </template>
            <template v-if="$role.IsHr()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Home </div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/users/staffs"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="menu__title"> Staff </div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/users/employees"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                        <div class="menu__title">Employee</div>
                    </inertia-link>
                </li>

                <li>
                    <inertia-link href="/users/users"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-user"></i> </div>
                        <div class="menu__title"> Other Staff</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/manage/staffDesignations"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-table"></i> </div>
                        <div class="menu__title"> Staff Designation </div>
                    </inertia-link>
                </li>
            </template>
            <template  v-if="$role.IsAccountant()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Accountant </div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsAccountant()">
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="menu__title"> Fee Settups <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li v-if="$role.IsAccountant()">
                            <inertia-link href="/accountant/quickReceiveFee"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Quick Receive Fee</div>
                            </inertia-link>
                        </li>
                        <li v-if="$role.IsAccountant()">
                            <inertia-link href="/accountant/feeCollections"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Collect Fee</div>
                            </inertia-link>
                        </li>
                        <li v-if="$role.IsAccountant()">
                            <inertia-link href="/accountant/feeMasters"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                                <div class="menu__title">Add Fee</div>
                            </inertia-link>
                        </li>
                        <li >
                            <inertia-link href="/manage/feeHeads"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-calculator"></i></div>
                                <div class="menu__title">Fee Head</div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>
                <li v-if="$role.IsAccountant()">
                    <inertia-link href="/accademic/examSchedules"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="menu__title">Balance Fee</div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsAccountant()">
                    <inertia-link href="/accademic/examSchedules"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="menu__title">Received Detail</div>
                    </inertia-link>
                </li>
            </template>
            <template  v-if="$role.IsAcademic()">
                <li>
                    <inertia-link href="/dashboard"  class="menu menu--active" >
                        <div class="menu__icon"> <i class="feather icon-home"></i> </div>
                        <div class="menu__title"> Accademic </div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsAcademic()">
                    <a href="javascript:;" class="menu">
                        <div class="menu__icon"> <i class="feather icon-inbox"></i> </div>
                        <div class="menu__title"> Examination <i class="feather icon-chevron-down menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/accademic/examSchedules"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title">Examination Schedule</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/accademic/examMarkLedger"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title">Examination Results</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/exams"  class="menu" >
                                <div class="menu__icon"> <i class="feather icon-user"></i></div>
                                <div class="menu__title"> Examination Types</div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>
                <li v-if="$role.IsAcademic()">
                    <inertia-link href="/manage/assignFaculties"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="menu__title">Assign Faculty/Class</div>
                    </inertia-link>
                </li>
                <li v-if="$role.IsAcademic()">
                    <inertia-link href="/manage/assignSubjects"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="menu__title">Assign Subject</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/users/studentTransfer"  class="menu" >
                        <div class="menu__icon"> <i class="feather icon-calendar"></i> </div>
                        <div class="menu__title"> student Transfer </div>
                    </inertia-link>
                </li>
            </template>
            <slot name="navigation"></slot>
        </ul>
    </div>
</template>

<script>
    import Velocity from 'velocity-animate'
	export default{
        data(){
            return {

            }
        },

        mounted(){

            (function(cash) {
                "use strict";

                // Mobile Menu
                cash('#mobile-menu-toggler').on('click', function() {
                    if (cash('.mobile-menu').find('ul').first()[0].offsetParent !== null) {
                        Velocity(cash('.mobile-menu').find('ul').first(), "slideUp")
                    } else {
                        Velocity(cash('.mobile-menu').find('ul').first(), "slideDown")
                    }
                })

                cash('.mobile-menu').find('.menu').on('click', function() {
                    if (cash(this).parent().find('ul').length) {
                        if (cash(this).parent().find('ul').first()[0].offsetParent !== null) {
                            cash(this).find('.menu__sub-icon').removeClass('transform rotate-180')
                            Velocity(
                                cash(this).parent().find('ul').first(),
                                "slideUp",
                                {
                                    duration: 300,
                                    complete: function(el) {
                                        cash(this).removeClass('menu__sub-open')
                                    }
                                }
                            )
                        } else {
                            cash(this).find('.menu__sub-icon').addClass('transform rotate-180')
                            Velocity(
                                cash(this).parent().find('ul').first(),
                                "slideDown",
                                {
                                    duration: 300,
                                    complete: function(el) {
                                        cash(this).addClass('menu__sub-open')
                                    }
                                }
                            )
                        }
                    }
                })
            })(cash)

        }

	}
</script>
