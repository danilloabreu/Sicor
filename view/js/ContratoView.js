class ContratoView {
    //elemento é o elemento para qual o html será renderizado
    constructor(elemento) {
        
        this.elemento = elemento;
    }
    //template é o html onde o model está inserido
    template(model) {
        
       let html = '<table class=\'table table-hover text-center\'><tr><th class =\'text-center\'>Numero da Parcela</th><th class =\'text-center\' >Valor</th><th class =\'text-center\'>Vencimento</th></tr>';
       
      for (var i = 0, len = model.listaParcela.parcelas.length; i < len; i++) {
          html+='<tr><th class =\'text-center\'>'+i+'</th><th class =\'text-center\'>'+model.listaParcela.parcelas[i].valor+'</th><th class =\'text-center\'>'+model.listaParcela.parcelas[i].vencimento+'</th></tr>';
        }
       html+='</table>';
       return html;
    }
    
    update(model) {
        
        this.elemento.innerHTML = this.template(model);
    }
}

