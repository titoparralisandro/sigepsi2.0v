<form action="" method="POST" enctype="multipart/form-data">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="modal fade" id="modal-create" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header card-header bg-primary">

                    <div class="color-palette">
                      <h1 class="text-center"><strong>Añadir nueva comunidad</strong></h1>
                    </div>

            </div>
            <div class="modal-body">
                <div class="card-body text-dark">

                @csrf<div class="row">
                        <div class="form-group col-4">

                          <label class="form-label">RIF</label>
                          <input id="rif" class="form-control" type="text" name="rif"  maxlength="10"
                          value="{{ isset($comunidad->rif)?$comunidad->rif:old('rif') }}">

                        </div>

                        <div class="form-group col-8">

                            <label class="form-label">Tipo de comunidad</label>

                            <select id="id_tipo_comunidad" name="id_tipo_comunidad" class="form-control">
                            <option selected>Seleccionar su tipo de comunidad</option>
                            @foreach ( $tipo_comunidad as $tipos_comunidades)

                                <option value="{{$tipos_comunidades->id}}">{{ $tipos_comunidades->tipo_comunidad }}</option>

                            @endforeach
                            </select>

                        </div>
                     </div>

                        <div class="form-group">

                            <label class="form-label">Comunidad</label>
                            <input id="nombre" class="form-control" type="text" name="nombre"
                            value="{{ isset($comunidad->nombre)?$comunidad->nombre:old('comunidad') }}">

                        </div>

                    <div class="row">

                        <div class="form-group col">

                            <label class="form">Teléfono de contacto</label>
                            <input id="telefono_contacto" class="form-control" type="tel" placeholder="(Código de operadora) número telefónico" name="telefono_contacto" maxlength="11"
                            value="{{ isset($comunidad->telefono_contacto)?$comunidad->telefono_contacto:old('telefono_contacto') }}">

                        </div>

                        <div class="form-group col">

                            <label class="form">Persona de contacto</label>
                            <input id="persona_contacto" class="form-control" type="text" name="persona_contacto" maxlength="50"
                            value="{{ isset($comunidad->persona_contacto)?$comunidad->persona_contacto:old('persona_contacto') }}">

                        </div>

                        <div class="form-group col">

                            <label class="form">Correo</label>
                            <input id="email" class="form-control" type="email" name="email"
                            value="{{ isset($comunidad->email)?$comunidad->email:old('email') }}">

                        </div>

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
                            <select name="id_parroquia" id="id_parroquia" class="form-control" value={{ isset($comunidad->id_parroquia)?$comunidad->id_parroquia:old('id_parroquia') }}></select>

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="form-label">Dirección</label>
                        <textarea id="direccion" class="form-control" name="direccion" cols="25" rows="4"
                        value="{{ isset($comunidad->direccion)?$comunidad->direccion:old('direccion') }}" placeholder="Escriba su dirección de forma detallada."></textarea>

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
        fetch('municipios',{
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
        fetch('parroquias',{
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
