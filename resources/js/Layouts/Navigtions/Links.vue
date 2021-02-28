<template>
    <ul>
        <li v-if="!$role.IsSuperadministrator() && !$role.IsStudent() ">
            <inertia-link href="/dashboard"  class="top-menu top-menu--active" >
                <div class="top-menu__icon"> <i class="feather icon-home"></i> </div>
                <div class="top-menu__title"> Home </div>
            </inertia-link>
        </li>
        <template  v-if="$role.IsSuperadministrator()">
            <li>
                <inertia-link href="/dashboard"  class="top-menu top-menu--active" >
                    <div class="top-menu__icon"> <i class="feather icon-home"></i> </div>
                    <div class="top-menu__title"> Dashboard </div>
                </inertia-link>
            </li>
            <li v-if="$role.IsSuperadministrator()">
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-layout"></i> </div>
                    <div class="top-menu__title"> Settings <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                            <div class="top-menu__title"> Academic Level <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <inertia-link href="/manage/faculties"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Classes/Faculty/Streams </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/semesters"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Semisters/Sections </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/studentBatches"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Student Batches </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                            <div class="top-menu__title"> Subjects & Grading<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <inertia-link href="/manage/gradingTypes"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Grading </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/subjects"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Subjects</div>
                                </inertia-link>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                            <div class="top-menu__title"> Statuses Settings<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <inertia-link href="/manage/studentStatuses"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Student Status </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/attendanceStatuses"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Attendance Status </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/bookStatuses"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> BookS Statuses </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/bedStatuses"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Bed Statuses </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/customerStatuses"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Customer Statuses </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" class="top-menu">
                            <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                            <div class="top-menu__title"> Time Settings<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                        </a>
                        <ul class="">
                            <li>
                                <inertia-link href="/manage/days"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                    <div class="top-menu__title"> Days </div>
                                </inertia-link>
                            </li>
                            <li>
                                <inertia-link href="/manage/months"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Months </div>
                                </inertia-link>
                            </li>
                            <li>

                                <inertia-link href="/manage/years"  class="top-menu" >
                                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                    <div class="top-menu__title"> Years </div>
                                </inertia-link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <inertia-link href="/manage/paymentMethods"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title"> Payment Method </div>
                        </inertia-link>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                    <div class="top-menu__title"> Users <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/users/staffs"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title"> Staff </div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/users/students"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title"> Students </div>
                        </inertia-link>
                    </li>
                    <li>

                        <inertia-link href="/users/employees"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                            <div class="top-menu__title">Employee</div>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/users/users"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                            <div class="top-menu__title"> Other Staff</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/manage/staffDesignations"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-table"></i> </div>
                            <div class="top-menu__title"> Staff Designation </div>
                        </inertia-link>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                    <div class="top-menu__title"> Accademic <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/assignment/assignments"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-head"></i></div>
                            <div class="top-menu__title">Assignments</div>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/manage/assignFaculties"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title">Assign Faculty/Class</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/manage/assignSubjects"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title">Assign Subject</div>
                        </inertia-link>
                    </li>

                    <li>
                        <inertia-link href="/accademic/examSchedules"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Examination Schedule</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accademic/examMarkLedger"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Examination Results</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/manage/exams"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title"> Examination Types</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accademic/examResult"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title"> Result Examination </div>
                        </inertia-link>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                    <div class="top-menu__title"> Library <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                   <li>
                    <inertia-link href="/library/studentLibrary/student"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">Students</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/library/studentLibrary/staff"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                        <div class="top-menu__title">Staff</div>
                    </inertia-link>
                </li>

                <li>
                    <inertia-link href="/library/books"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                        <div class="top-menu__title">Issue Books</div>
                    </inertia-link>
                </li>


                <li>
                    <inertia-link href="/library/bookMasters"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="top-menu__title">All Books</div>
                    </inertia-link>
                </li>
                <li>
                    <inertia-link href="/manage/bookCategories"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                        <div class="top-menu__title">Books Category</div>
                    </inertia-link>
                </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="top-menu__title"> Fee Settups <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/accountant/quickReceiveFee"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Quick Receive Fee</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accountant/feeCollections"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Collect Fee</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accountant/feeMasters"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Add Fee</div>
                        </inertia-link>
                    </li>
                    <li >
                        <inertia-link href="/manage/feeHeads"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-calculator"></i></div>
                            <div class="top-menu__title">Fee Head</div>
                        </inertia-link>
                    </li>

                    <!-- <li>
                        <inertia-link href="/accademic/examSchedules"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Balance Fee</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accademic/examSchedules"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Received Detail</div>
                        </inertia-link>
                    </li> -->

                </ul>
            </li>

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="top-menu__title"> HOSTELS <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/hostel/residents"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Resident</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/hostel/hostels"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-house"></i></div>
                            <div class="top-menu__title">Hostels</div>
                        </inertia-link>
                    </li>
                    <li >
                        <inertia-link href="/manage/roomTypes"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-calculator"></i></div>
                            <div class="top-menu__title">Room Type</div>
                        </inertia-link>
                    </li>


                </ul>
            </li>


        </template>
        <template v-if="$role.IsLibrarian()">

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                    <div class="top-menu__title"> Members<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li v-if="$role.IsLibrarian()">
                        <inertia-link href="/library/studentLibrary/student"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Students</div>
                        </inertia-link>
                    </li>
                    <li v-if="$role.IsLibrarian()">
                        <inertia-link href="/library/studentLibrary/staff"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Staff</div>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                    <div class="top-menu__title"> Books<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li v-if="$role.IsLibrarian()" >
                        <inertia-link href="/library/bookMasters"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                            <div class="top-menu__title">All Books</div>
                        </inertia-link>
                    </li>
                    <li v-if="$role.IsLibrarian()">
                        <inertia-link href="/manage/bookCategories"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-book"></i></div>
                            <div class="top-menu__title">Books Category</div>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li v-if="$role.IsLibrarian()" >
                <inertia-link href="/library/books"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                    <div class="top-menu__title">Issue Books</div>
                </inertia-link>
            </li>
        </template>
        <template v-if="$role.IsStaff()">

            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                    <div class="top-menu__title"> Admission<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/users/students"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                            <div class="top-menu__title"> Students </div>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                    <div class="top-menu__title"> Examination<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/accademic/examMarkLedger"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Examination Results</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accademic/examResult"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title"> Result Examination </div>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li>
                <inertia-link href="/assignment/assignments"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-head"></i></div>
                    <div class="top-menu__title">Assignments</div>
                </inertia-link>
            </li>

        </template>

        <template v-if="$role.IsStudent()">
            <li>
                <inertia-link href="/dashboard"  class="top-menu top-menu--active" >
                    <div class="top-menu__icon"> <i class="feather icon-home"></i> </div>
                    <div class="top-menu__title"> {{ $page.user.name }} </div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/student/students"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                    <div class="top-menu__title"> My Examination </div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/student/getStudentResult"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                    <div class="top-menu__title">My Examination Results</div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/student/assignments"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-head"></i></div>
                    <div class="top-menu__title">My Assignments</div>
                </inertia-link>
            </li>
        </template>

        <template v-if="$role.IsHr()">
            <li>
                <inertia-link href="/users/staffs"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                    <div class="top-menu__title"> Staff </div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/users/employees"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                    <div class="top-menu__title">Employee</div>
                </inertia-link>
            </li>

            <li>
                <inertia-link href="/users/users"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-user"></i> </div>
                    <div class="top-menu__title"> Other Staff</div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/manage/staffDesignations"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-table"></i> </div>
                    <div class="top-menu__title"> Staff Designation </div>
                </inertia-link>
            </li>
        </template>
        <template  v-if="$role.IsAccountant()">

            <li v-if="$role.IsAccountant()">
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 011 1v3a1 1 0 11-2 0v-3a1 1 0 011-1zm-3 3a1 1 0 100 2h.01a1 1 0 100-2H10zm-4 1a1 1 0 011-1h.01a1 1 0 110 2H7a1 1 0 01-1-1zm1-4a1 1 0 100 2h.01a1 1 0 100-2H7zm2 1a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zm4-4a1 1 0 100 2h.01a1 1 0 100-2H13zM9 9a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1zM7 8a1 1 0 000 2h.01a1 1 0 000-2H7z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="top-menu__title"> Fee Settups <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li >
                        <inertia-link href="/manage/feeHeads"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-calculator"></i></div>
                            <div class="top-menu__title">Fee Head</div>
                        </inertia-link>
                    </li>
                    <li v-if="$role.IsAccountant()">
                        <inertia-link href="/accountant/feeMasters"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Add Fee</div>
                        </inertia-link>
                    </li>
                    <li v-if="$role.IsAccountant()">
                        <inertia-link href="/accountant/feeMasters"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Balance Fee</div>
                        </inertia-link>
                    </li>
                    <li v-if="$role.IsAccountant()">
                        <inertia-link href="/accountant/feeCollections"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                            <div class="top-menu__title">Received Detail</div>
                        </inertia-link>
                    </li>

                </ul>
            </li>
            <li v-if="$role.IsAccountant()">
                <inertia-link href="/accountant/quickReceiveFee"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                    <div class="top-menu__title">Quick Receive Fee</div>
                </inertia-link>
            </li>
            <li v-if="$role.IsAccountant()">
                <inertia-link href="/accountant/feeCollections"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                    <div class="top-menu__title">Collect Fee</div>
                </inertia-link>
            </li>

        </template>
        <template  v-if="$role.IsAcademic()">
            <li v-if="$role.IsAcademic()">
                <a href="javascript:;" class="top-menu">
                    <div class="top-menu__icon"> <i class="feather icon-inbox"></i> </div>
                    <div class="top-menu__title"> Examination <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                </a>
                <ul class="">
                    <li>
                        <inertia-link href="/accademic/examSchedules"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Examination Schedule</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/accademic/examMarkLedger"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title">Examination Results</div>
                        </inertia-link>
                    </li>
                    <li>
                        <inertia-link href="/manage/exams"  class="top-menu" >
                            <div class="top-menu__icon"> <i class="feather icon-user"></i></div>
                            <div class="top-menu__title"> Examination Types</div>
                        </inertia-link>
                    </li>
                </ul>
            </li>
            <li v-if="$role.IsAcademic()">
                <inertia-link href="/manage/assignFaculties"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                    <div class="top-menu__title">Assign Faculty/Class</div>
                </inertia-link>
            </li>
            <li v-if="$role.IsAcademic()">
                <inertia-link href="/manage/assignSubjects"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                    <div class="top-menu__title">Assign Subject</div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/users/studentTransfer"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                    <div class="top-menu__title"> student Transfer </div>
                </inertia-link>
            </li>
        </template>

        <template  v-if="$role.IsWarden()">
            <li>
                <inertia-link href="/hostel/residents"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-plus"></i></div>
                    <div class="top-menu__title">Resident</div>
                </inertia-link>
            </li>
            <li>
                <inertia-link href="/hostel/hostels"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-house"></i></div>
                    <div class="top-menu__title">Hostels</div>
                </inertia-link>
            </li>
            <li >
                <inertia-link href="/manage/roomTypes"  class="top-menu" >
                    <div class="top-menu__icon"> <i class="feather icon-calculator"></i></div>
                    <div class="top-menu__title">Room Type</div>
                </inertia-link>
            </li>

        </template>







<!--
        <li v-if="$role.IsSuperadministrator()">
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i class="feather icon-layout"></i> </div>
                <div class="top-menu__title"> Settings <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Academic Level <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/faculties"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Classes/Faculty/Streams </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/semesters"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Semisters/Sections </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/studentBatches"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Student Batches </div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Subjects & Grading<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/gradingTypes"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Grading </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/subjects"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Subjects</div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Statuses Settings<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/studentStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Student Status </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/attendanceStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Attendance Status </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/bookStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> BookS Statuses </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/bedStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Bed Statuses </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/customerStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Customer Statuses </div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Time Settings<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/days"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Days </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/months"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Months </div>
                            </inertia-link>
                        </li>
                        <li>

                            <inertia-link href="/manage/years"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Years </div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <inertia-link href="/manage/paymentMethods"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="top-menu__title"> Payment Method </div>
                    </inertia-link>
                </li>

            </ul>
        </li>


        <li v-if="$role.IsSuperadministrator()">
            <a href="javascript:;" class="top-menu">
                <div class="top-menu__icon"> <i class="feather icon-layout"></i> </div>
                <div class="top-menu__title"> Academic <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Academic Level <i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/faculties"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Classes/Faculty/Streams </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/semesters"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Semisters/Sections </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/studentBatches"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Student Batches </div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Subjects & Grading<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/gradingTypes"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Grading </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/subjects"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Subjects</div>
                            </inertia-link>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Statuses Settings<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/studentStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title"> Student Status </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/attendanceStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Attendance Status </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/bookStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> BookS Statuses </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/bedStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Bed Statuses </div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/customerStatuses"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-calendar"></i> </div>
                                <div class="top-menu__title"> Customer Statuses </div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:;" class="top-menu">
                        <div class="top-menu__icon"> <i class="feather icon-activity"></i> </div>
                        <div class="top-menu__title"> Assign Teacher<i class="feather icon-chevron-down top-menu__sub-icon" ></i> </div>
                    </a>
                    <ul class="">
                        <li>
                            <inertia-link href="/manage/assignFaculties"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title">Assign Faculty/Class</div>
                            </inertia-link>
                        </li>
                        <li>
                            <inertia-link href="/manage/assignSubjects"  class="top-menu" >
                                <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                                <div class="top-menu__title">Assign Subject</div>
                            </inertia-link>
                        </li>
                    </ul>
                </li>
                <li>
                    <inertia-link href="/manage/assignSubjects"  class="top-menu" >
                        <div class="top-menu__icon"> <i class="feather icon-clock"></i> </div>
                        <div class="top-menu__title">Assign Subject</div>
                    </inertia-link>
                </li>

            </ul>
        </li> -->


        <slot name="navigation"></slot>
    </ul>
</template>

<script>
    export default {
        name: "Links",

        mounted(){

        }
    }
</script>

<style scoped>

</style>
