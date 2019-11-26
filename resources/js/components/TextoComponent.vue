<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Publicado em {{ texto.created_at }} - Atualizado em {{ texto.updated_at }}</div>

                        <div class="card-body">
                            <input v-if="editMode" type="text" class="form-control" v-model="texto.descricao">
                            <p v-else>{{ texto.descricao }}</p>
                        </div>
                            <div class="card-header">
                                <button v-if="editMode" class="btn badge-primary" v-on:click="onClickUpdate()">Atualizar</button>
                                <button v-else class="btn badge-dark" v-on:click="onClickEdit()">Editar</button>
                                <button class="btn badge-danger" v-on:click="onClickDelete()">Apagar</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['texto'], // recebendo informação do componente pai atraves da diretiva :texto="texto"
        data(){
            return {
                // texto: {
                //     id: '',
                //     descricao: '',
                //     created_at: ''
                // }
                editMode: false
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            onClickDelete() {
                axios.delete(`/laravel-vue/public/texto/${this.texto.id}`).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit(){
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    descricao: this.texto.descricao // capturando a edição do input
                };
                axios.put(`/laravel-vue/public/texto/${this.texto.id}`, params).then((response) => {
                    this.editMode = false;
                    const texto = response.data;
                    this.$emit('update', texto);
                });
            }
        }
    }
</script>
