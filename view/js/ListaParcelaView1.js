class ContratoView {
    
    constructor(elemento) {
        
        this.elemento = elemento;
    }
    
    template(model) {
        
        return `
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>DATA</th>
                    <th>QUANTIDADE</th>
                    <th>VALOR</th>
                    <th>VOLUME</th>
                </tr>
            </thead>
        
            <tbody>
                                
            </tbody>
                  
            <tfoot>
                <td colspan="3"></td>
                <td>
      
                </td>
            </tfoot>
            
        </table>
        `;
    }
    
    update(model) {
        
        this.elemento.innerHTML = this.template(model);
    }
}




