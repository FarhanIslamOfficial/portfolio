<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
               <form @submit.prevent="addSkill()">
                    <div class="form-group ">
                          <label > Add Skills </label>
                        <div class="d-flex">
                             
                                <input type="text" class="form-control form-group" v-model="skill">
                                <button type="submit" class="btn btn-sm btn-primary form-group">Add</button>
                        </div>
                       
                    </div>   
                </form>

               <div v-if="skills !== []" class="card-body">
                   <p>Your Current Skills</p>
                   <span  class="badge badge-secondary m-2 p-2" v-for="(skill , index) in skills" :key="index">{{skill}}</span>
               </div>
            </div>
        </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
               <form @submit.prevent="addAwards()">
                    <div class="form-group ">
                          <label > Add Awards </label>
                        <div class="d-flex">
                                <input type="text" class="form-control form-group" v-model="award">
                                <button type="submit" class="btn btn-sm btn-primary form-group"  >Add</button>
                        </div>
                       
                    </div>   
                </form>

                <div v-if="awards !== []" class="card-body">
                   <p>Your Current Awards</p>
                   <span class="badge badge-secondary m-2 p-2"  v-for="(award , index) in awards" :key="index">{{award}}</span>
                </div>
            </div>
        </div>
          <div class="row justify-content-center">
            <div class="col-md-8">
               <form @submit.prevent="addInterests()">
                    <div class="form-group ">
                          <label > Add / Update Interests </label>
                        <div class="d-flex">
                                <textarea type="text" rows="4"  class="form-control form-group" v-model="interests" placeholder="Put YOur Interests">{{`${interests}`}}</textarea>
                                <button v-if="!interests" type="submit" class="btn btn-sm btn-primary form-group" >Add</button>
                                 <button v-if="interests" type="submit" class="btn btn-sm btn-primary form-group" >Update</button>
                        </div>
                       
                    </div>   
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
           this.fetchSliksAndAwards();
           this.fetchInterest();
        },
      data: function() {
        return {
                skill:"",
                skills:[],
                award:"",
                awards:[],
                interests:"",
            }
        },
        methods:{

            addSkill(){
                this.skills.push(this.skill);
                this.skill="";
                axios.post("/add/skills",{
                    skills:this.skills
                }).then((res)=>{
                     this.$alert("Skill Added Successfully..!!!");
                }).catch((err)=>{consolelog(err)});
            },
             addAwards(){
                this.awards.push(this.award);
                this.award="";
                axios.post("/add/awards",{
                    awards:this.awards
                }).then((res)=>{
                    this.$alert("Award Added Successfully..!!!");
                }).catch((err)=>{consolelog(err)});
            },
            fetchSliksAndAwards(){
                axios.get("/skills-awards").then((res)=>{
                   this.skills=res.data.skills;
                   this.awards=res.data.awards;
                }).catch();
            },
            fetchInterest(){
                axios.get("/fetch-interesrts").then((res)=>{
                    this.interests=res.data.interests;
                    console.log(res.data.interests);
                }).catch();
            },
            addInterests(){
                axios.post("/add-interests",{
                    interests:this.interests,
                }).then((res)=>{
                      this.$alert("Interests Added Successfully..!!!");
                }).catch();
            }
          
        }
    }
</script>
<style lang="scss" scoped>
button{
padding-left: 10px;
 padding-right: 10px;

}
input{
    padding: 10px;    
}
</style>
