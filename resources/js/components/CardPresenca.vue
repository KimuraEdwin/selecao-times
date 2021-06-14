<template>
    <div class="card mt-4" style="height: 85vh">
        <div class="card-header">
            <h5 class="card-title">{{ title }}</h5>
        </div>
        <div class="card-body overflow-auto">
            <form id='sorteio' method="POST" :action="'/'">
                <input type="hidden" name="_token" :value="csrf_token">
                <div class="form-group">
                    <label for="qtd">Informe a quantidade de jogadores por time</label>
                    <input type="text" class="form-control" id="qtd" name="qtd" required>
                    <small id="qtdHelp" class="form-text text-muted">Apenas números*</small>
                </div>
                <div class="list-group">
                    <label v-for="(jogador, i) in listaJogadores" :key="i" class="list-group-item list-group-item-action mb-0" :for="'jogador'+jogador['id']">
                        <input class="form-check-input ml-3" type="checkbox" @change="marcarPresenca($event)" :name="'jogador'+i" :value="jogador['id']" :id="'jogador'+jogador['id']">
                        <label class="ml-5 w-75" :for="'jogador'+jogador['id']">
                            <span>
                                {{ jogador['nome'] }}
                            </span>
                            <span class="float-right mr-4">
                                {{ jogador['goleiro']? 'Goleiro' : '' }}
                            </span>
                        
                        </label>
                    </label>
                </div>
            </form>
        </div>
        <div class="card-footer text-muted text-center">
            <p>{{ numJogadores }} jogadores presentes</p>
            <span>
                <button type="submit" class="btn btn-info" form="sorteio">Sortear</button>
            </span> 
        </div>
    </div>
</template>

<script>
    export default {
        props:['csrf_token', 'title', 'jogadores', 'dir', 'path'],
        data(){
            return {
                numJogadores: 0,
                listaJogadores: JSON.parse(this.jogadores),
                presencaJogadores: [],
                url: this.dir.replace(this.path, ''),
            }
        },
        methods:{
            marcarPresenca(e){
                if(e.target.checked){
                    this.numJogadores++
                }
                else{
                    this.numJogadores--
                }
            },
        }
    }
</script>

