<template>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <form-component @new="addTexto"></form-component>
            <!--@new="addTexto" - escuta evento 'new' que recebe atributos do componente filho e chama o método addTexto -->
            <br>
            <texto-component
            v-for="(texto, index) in textos"
            :key="texto.id"
            :texto="texto"
            @delete="deleteTexto(index)"
            @update="updateTexto(index, ...arguments)"
            ></texto-component> <!-- :texto="texto" - passa o objeto inteiro para o componente filho -->
            <!-- <texto-component v-for="texto in textos" :key="texto.id" :texto="{ id:1, descricao:'teste', created_at:'11/11/111' }"></texto-component> passando atributos específicos do objeto -->
            <!-- recebe o evento @delete e chama o método deleteTexto() passando o index do array de textos -->

        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                textos: []
            }
        },

        mounted() {
            axios.get('/laravel-vue/public/texto').then((response) => {
                this.textos = response.data;
            });
        },
        methods: {
            addTexto(texto){ // parâmetro recebido de um componente filho através da diretiva @new="addTexto"
                this.textos.push(texto); // inserindo o texto recebido do filho dentro do array de objetos da função data
            },
            deleteTexto(index){
                this.textos.splice(index, 1); // função splice retirar da posição um elemento
            },
            updateTexto(index, texto){
                this.texto[index] = texto;
            }
        }
    }
</script>
