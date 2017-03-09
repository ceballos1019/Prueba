<br>
<h3><span class="glyphicon glyphicon-circle-arrow-right"></span> Salida</h3><br>
    
    <div class="row">

        <div class="col-md-6 col-md-offset-3">
            <fieldset>
                <legend >Búsqueda por:</legend>
                <div class="col-md-5">
                    <label class="control-label" for="n_bodega">Código</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <br>ó
                </div>
                <div class="col-md-5">
                    <label class="control-label" for="n_bodega">Artículo</label>
                    <select class="form-control">
                        <option>Álgebra y Trigonometría</option>
                        <option>Álgebra Lineal</option>
                    </select>
                </div>
            </fieldset>
        </div>
        
    </div>
    
    <br><br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
            <label class="control-label" for="n_bodega">Artículo</label>
            <input type="text" class="form-control">
        </div>        
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Costo Unitario</label>
            <input type="text" class="form-control">
        </div>        
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Bodega</label>
            <select class="form-control">
                <option>Bodega 1</option>
                <option>Bodega 2</option>
            </select>
        </div>          
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Total en Bodega</label>
            <input type="text" class="form-control">
        </div> 
    </div>
    
    <br>
    <div class="row">
        <div class="col-md-2 col-md-offset-2">
            <label class="control-label" for="n_bodega">Existencias</label>
            <input type="text" class="form-control">
        </div>    
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Total Salida</label>
            <div class="input-group">
                <input type="text" class="form-control">
                <div class="input-group-addon">$</div>
            </div>            
        </div>        
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Librería Destino</label>
            <select class="form-control">
                <option>Librería 1</option>
                <option>Librería 2</option>
            </select>
        </div>       
        <div class="col-md-2">
            <label class="control-label" for="n_bodega">Fecha</label>
            <div class="input-group">
                <input type="text" class="form-control">
                <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
            </div>            
        </div>
    </div>
    
    <br><br>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Registrar Salida</button>
        </div>  
    </div>
    
    <br><br><br>
    <h4><span class="glyphicon glyphicon-circle-arrow-right"></span> Registros de Salida</h4><br><br>
    <table class="table">
        <tr>
            <th>#</th>
            <th>Artículo</th>
            <th># Existencias</th>
            <th>$ Existencia</th>
            <th>$ Total Salida</th>
            <th>Desde</th>
            <th>Hacia</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Álgebra y Trigonometría</td>
            <td>3</td>
            <td>13000</td>
            <td>39000</td>
            <td>Bodega 1</td>
            <td>Librería 2</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Álgebra Lineal</td>
            <td>5</td>
            <td>17000</td>
            <td>85000</td>
            <td>Bodega 2</td>
            <td>Librería 4</td>
        </tr>
        
    </table>
    
