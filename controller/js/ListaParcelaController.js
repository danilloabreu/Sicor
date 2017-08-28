class ListaParcelaController{
    
    constructor (){
        
        let $ = document.querySelector.bind(document);
           
        this.inputComprador =$('#comprador');
        this.inputCorretor =$('#corretor');
        this.inputQuadra = $('#quadra');
        this.inputlote = $('#lote');
        this.inputValor = $('#valor');
        this.inputData = $('#data');
        this.contrato= new Contrato();
        this.view = new ListaParcelaView($('#negociacoesView'));
        this.view.update(this.contrato);
    }
    
    adiciona(){
        //idLote,dataVenda,valorVenda,detalheContrato,listaParcela
        //this.contrato.valorVenda=inputValorVenda;
       
    }
    
}


