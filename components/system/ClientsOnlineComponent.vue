<template>
    <section>
        <div class="block pull-r-l">
            <div class="block-content block-content-full block-content-sm bg-body-light">
                <div class="row">
                    <div class="col-12">
                        <div class="font-size-sm font-w600 text-uppercase text-muted text-center">Usuarios online</div>
                        <div class="font-size-h4 text-center">
                            <span>{{ users.length }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block pull-r-l">
            <div class="block-header bg-body-light">
                <h3 class="block-title"><i class="fa fa-fw fa-users font-size-default mr-5"></i>Usuarios online</h3>
                <div class="block-options">
                    <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                </div>
            </div>
            <div class="block-content">
                <ul class="nav-users push">
                    <li v-for="(user, index) in users" :key="index">
                        <a href="#">
                            <img class="img-avatar" src="https://akns-images.eonline.com/eol_images/Entire_Site/2019726/rs_600x600-190826232132-e-asia-twice-mina-thumbnail-GettyImages-1155471411.jpg" alt="">
                            <i class="fa fa-circle text-success"></i> {{ user.name }}
                            <div class="font-w400 font-size-xs text-muted">{{ user.email }}</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data(){
        return{
            users: [],
        }
    },
    mounted(){
        Echo.join('clientsOnline')
        .here((user) => {
            
            this.users = user;  
            console.log(this.users);   
        })
        .joining((user) => {
            if(!this.users.some((element) => {
                return element.id == user.id
            })){
                this.users.push(user);
            }
            
        })
        .leaving((user) => {
            let index = this.users.findIndex((element) => {
                return element.id == user.id
            })
            this.users.splice(index, 1);
        });
    },
    methods:  {
        getUsersOnline: function(){
           
        }
    }
}
</script>

<style>

</style>