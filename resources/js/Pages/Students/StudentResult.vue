<template>
    <app-master>
        <template #header>
            <div class="-intro-x breadcrumb breadcrumb--light mr-auto">
                <a href="" class="">Application</a>
                <i class="feather icon-chevron-right breadcrumb__icon" ></i> <a href="" class="breadcrumb--active">{{pagetitle}}</a>
            </div>
        </template>
        <template #navigation> </template>

        <div class="py-12">
            <div class="grid grid-cols-1 gap-1">
                <!-- BEGIN: Daily Sales -->
                <student-detail v-if="Object.keys(vans.student).length !== 0" :student="vans.student.data"></student-detail>
                <div class="intro-y box" v-for="facuty in vans.faculty">
                    <div class="overflow-x-auto" v-for="semester in vans.semester">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap"></th>
                                        <th v-for="exam in vans.exams" class="border border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="2">{{exam.exam.title}}</th>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap" colspan="2" >Summary </th>
                                    </tr>
                                    <tr>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Subjects</th>
                                        <template v-for="exam in vans.exams">
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap" >Theory</th>
                                            <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap" >Practical</th>
                                        </template>
                                        <th class="border border-b-2 dark:border-dark-5 whitespace-no-wrap">Total Marks </th>
                                        <th class="border border-b-2 dark:border-dark-5  whitespace-no-wrap">Avarage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="hover:bg-gray-200" v-for="subject in vans.subjects">
                                        <td class="border"  >{{subject.title }}</td>
                                    <template v-for="(exam ,index) in vans.exams">
                                        <td class="border" >{{findsubjectResult(facuty.id,semester.id,subject.id,exam.exams_id,"theory")}}</td>
                                        <td class="border" >{{findsubjectResult(facuty.id,semester.id,subject.id,exam.exams_id,"practical")}}</td>
                                    </template>

                                        <td class="border" >{{findTotal(facuty.id,semester.id,subject.id)}}</td>
                                        <td class="border" >{{findTotal(facuty.id,semester.id,subject.id)/( Object.keys(vans.exams).length)}}</td>
                                </tr>
                                </tbody>
                            </table>

                    </div>

                </div>
                <!-- END: Daily Sales -->
            </div>
        </div>
    </app-master>
</template>

<script>
    import AppMaster from '@/Layouts/AppMaster'
    import StudentDetail from "@/Reusable/StudentDetail";

    export default {
        props: {
            vans: {
                type: Object,
                required: true,
            },
            pagetitle:{
                type:String,
                required:true,
            }
        },
        name:'tu',
        components: {
            StudentDetail,
            AppMaster,
        },
        methods: {
            findsubjectResult(facId,SemId,subId,exam,display){
                let merk = 0;
                let marks = this.vans.marks;
                marks.forEach((ele)=>{
                    if (ele.exam_schedule.faculty_id == facId && ele.exam_schedule.semesters_id == SemId &&  ele.exam_schedule.subjects_id == subId && ele.exam_schedule.exams_id == exam ){
                        if(display == "theory"){
                            merk = ele.obtain_mark_theory? ele.obtain_mark_theory: 0;
                        }else if(display == 'practical'){
                            merk = ele.obtain_mark_practical? ele.obtain_mark_practical: 0;
                        }
                        else {
                            merk = 0;
                        }
                    }
                });

                return merk;

            },
            findTotal(facId,SemId,subId){
                let merk = 0;
                let marks = this.vans.marks;
                marks.forEach((ele)=>{
                    if (ele.exam_schedule.faculty_id == facId && ele.exam_schedule.semesters_id == SemId &&  ele.exam_schedule.subjects_id == subId){
                        merk += (eval(ele.obtain_mark_theory) + eval(ele.obtain_mark_practical))
                    }
                });
                return merk;
            },

        },
        created() {

        }
    }
</script>
