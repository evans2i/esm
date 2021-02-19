export default class Role {

    constructor(role) {
      this.role = Object.assign([], role.roles);

    }


    IsSuperadministrator() {
        return this.checkFun('superadministrator');
    }
    IsOwner() {
      return this.checkFun('owner');
    }
    IsAdministrator() {
        return this.checkFun('administrator');
    }
    IsManager() {
        return this.checkFun('manager');
    }
    IsHr() {
        return this.checkFun('hr');
    }
    IsStaff() {
        return this.checkFun('staff');
    }

    IsAccountant() {
        return this.checkFun('accountant');
    }
    IsStudent() {
        return this.checkFun('student');
    }
    IsAcademic(){
        return this.checkFun('academic');
    }
    IsLibrarian(){
        return this.checkFun('librarian');
    }

    IsWarden(){
        return this.checkFun('warden');
    }


    checkFun(data){
        const arrData = this.role;
        let m = false;
        arrData.forEach(obj => {
            if(obj.name === data){
                m = true;
            }
        });
        return m;
    }

      //v-if="$gate.isAdmin()"
    /*
    if (this.$gate.isAdmin()) {
            axios.get("api/users").then(({ data }) => (this.users = data.data));
          }
      */


  }
