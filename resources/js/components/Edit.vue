<template>
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Editar Jogador</h5>
        </div>
        <div class="card-body">
            <form method="post" :action="url+'jogadores/'+jogador.id">
                <input type="hidden" name="_token" :value="csrf_token">
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" aria-describedby="nomeHelp" :value="jogador.nome">
                </div>
                <div class="form-group">
                    <label for="habilidade">Habilidade</label>
                    <input type="number" class="form-control" id="habilidade" name="habilidade" :value="jogador.habilidade">
                </div>

                <div class="form-group">
                    <label class="form-check-label mr-5" for="goleiro">É goleiro?</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="goleiro" id="goleiro1" value="0" :checked="!jogador.goleiro">
                        <label class="form-check-label" for="goleiro1">Não</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="goleiro" id="goleiro2" value="1" :checked="jogador.goleiro">
                        <label class="form-check-label" for="goleiro2">Sim</label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        props:['csrf_token', 'jogadorSelecionado', 'dir', 'path'],
        data(){
            return {
                jogador: JSON.parse(this.jogadorSelecionado),
                url: this.dir.replace(this.path, ''),
            }
        },

    }
</script>
