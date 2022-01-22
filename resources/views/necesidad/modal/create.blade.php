<form action="" method="POST" enctype="multipart/form-data">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="modal fade" id="modal-create" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card-header bg-primary">
    
                        <div class="color-palette">
                          <h1 class="text-center"><strong>Añadir nueva necesidad</strong></h1>
                        </div>
    
                </div>
                <div class="modal-body">
                    <div class="card-body text-dark">
    
                    @csrf
                    
                        <div class="form-group">
        
                            <label class="form-label">Necesidad</label>
                            <textarea id="necesidad" class="form-control" name="necesidad" cols="25" rows="4"
                            placeholder="Escriba su necesidad la cual afecta a su institución representada de forma detallada."></textarea>

                        </div>
    
                        <div class="row">
    
                            <div class="form-group col">
    
                                <label class="form-label">Estado</label>
    
                                <select name="id_estado" id="id_estado" class="form-control">
                                <option selected>Seleccionar su estado</option>
                                    @foreach ($estados as $item)
                                    <option value="{{$item->id_estado}}">{{$item->estado}}</option>
                                    @endforeach
                                </select>
    
                            </div>
    
                            <div class="form-group col">
    
                                <label class="form-label">Municipio</label>
                                <select name="id_municipio" id="id_municipio" class="form-control"></select>
    
                            </div>
    
                            <div class="form-group col">
    
                                <label class="form-label">Parroquia</label>
                                <select name="id_parroquia" id="id_parroquia" class="form-control"></select>
    
                            </div>
    
                        </div>
    
                        <div class="form-group">
    
                            <label class="form-label">Dirección</label>
                            <textarea id="direccion" class="form-control" name="direccion" cols="25" rows="4"
                            value="" placeholder="Escriba su dirección de forma detallada."></textarea>
    
                        </div>

                        </form>
    
                    </div>
                </div>
    
                <div class="modal-footer">
    
                    <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Registrar</button>
    
                </div>
            </div>
        </div>
    </div>
   
    <script>
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        document.getElementById('id_estado').addEventListener('change',(e)=>{
            fetch('getmunicipios',{
                method : 'POST',
                body: JSON.stringify({texto : e.target.value}),
                headers:{
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response =>{
                return response.json()
            }).then( data =>{
    
                var opciones ="<option value=''>Seleccione su municipio</option>";
                for (let i in data.lista) {
                   opciones+= '<option value="'+data.lista[i].id_municipio+'">'+data.lista[i].municipio+'</option>';
                }
                document.getElementById("id_municipio").innerHTML = opciones;
                document.getElementById("id_parroquia").innerHTML = '';
            }).catch(error =>console.error(error));
        })
    
        document.getElementById('id_municipio').addEventListener('change',(e)=>{
            fetch('getparroquias',{
                method : 'POST',
                body: JSON.stringify({texto : e.target.value}),
                headers:{
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                }
            }).then(response =>{
                return response.json()
            }).then( data =>{
                var opciones ="<option value=''>Seleccione su parroquia</option>";
                for (let i in data.lista) {
                   opciones+= '<option value="'+data.lista[i].id_parroquia+'">'+data.lista[i].parroquia+'</option>';
                }
                document.getElementById("id_parroquia").innerHTML = opciones;
            }).catch(error =>console.error(error));
        })
    
    </script>