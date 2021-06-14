<template>
    <div class="card mt-4" style="height: 90vh;">
        <div class="card-header">
            <h3 class="card-title m-auto">Jogadores</h3>
        </div>
        <div class="card-body overflow-auto">
            <div class="list-group">
                <li v-for="(jogador, i) in listaJogadores" :key="i" class="list-group-item list-group-item-action mb-0 d-flex justify-content-between" for="defaultCheck1">
                    <span class="w-50">
                        {{ jogador['nome'] }}
                    </span>
                    <span class="w-50 text-center">
                        <strong>Habilidade:</strong> {{ jogador['habilidade'] }}   -   <strong>Goleiro:</strong> <span :class="jogador['goleiro']? green:red">{{ jogador['goleiro']?'Sim':'Não' }}</span>
                    </span>
                    <span class="w-50 text-right">
                        <a :href="url+'jogadores/'+jogador['id']+'/edit'">
                            <button class="btn btn-warning">Editar</button>
                        </a>
                    </span>
                </li>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['jogadores', 'dir', 'path'],
        data(){
            return{
                listaJogadores: JSON.parse(this.jogadores),
                url: this.dir.replace(this.path, ''),
                red: 'text-danger font-weight-bold',
                green: 'text-success font-weight-bold',
            }
        }
    }
</script>
