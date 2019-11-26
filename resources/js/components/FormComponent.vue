<template>
    <div>
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">Cadastro</div>

                    <div class="card-body">


                        <form action="" v-on:submit.prevent="createTexto()"> <!-- o prevent evita que a página seja recarregada -->
                            <div class="form-group">
                                <label for="texto">Texto:</label>
                                <input type="text" class="form-control" name="texto" v-model="descricao">
                            </div>
                            <button type="submit" class="btn btn-dark">Enviar</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                descricao: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            createTexto(){ // método chamado ao clicar no botão submit
                const params = {
                    descricao: this.descricao
                };
                this.descricao = "";
                axios.post('/laravel-vue/public/texto', params).then((response) => {
                    const texto = response.data;
                    this.$emit('new', texto) // emitindo evento chamado 'new' que envia atributos para componente pai através da diretiva v-on

                });
                // let texto = { // insere o objeto na varivável, em seguida passa como parâmetro do $emit
                //     id: 2,
                //     descricao: this.descricao,
                //     created_at: '55/55/5555'
                // }

                //alert(this.descricao); // para utilizar variável desse escopo é necessário o uso do this.
            }
        },

    }
</script>
