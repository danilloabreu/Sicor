class ContratoController{
    
    constructor (){
        
        let $ = document.querySelector.bind(document);   
        this.inputComprador =$('#comprador');
        this.inputCorretor =$('#corretor');
        this.inputQuadra = $('#quadra');
        this.inputLote = $('#lote');
        this.inputValor = $('#valor');
        this.inputData = $('#data');
        this.inputQtdParcela = $('#qtd');
        this.contrato= new Contrato();
        this.contrato.listaParcela=new ListaParcela();
        this.view = new ContratoView($('#negociacoesView'));//cria uma nova view e indica a div a ser renderizada
        
    }
    
    adicionaContrato(){
        this.contrato.comprador=this.inputComprador.value;
        this.contrato.corretor=this.inputCorretor.value;
        
        
    }
    
    
    adicionaParcela(){
        
    for (let i=0;i<=this.inputQtdParcela.value;i++){
        let parcela = new Parcela(1,'','FIN',this.inputData.value,this.inputValor.value);
        this.contrato.listaParcela.adiciona(parcela);
       }
       
       this.view.update(this.contrato);
       
    }
    
}


