<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<h1>Reportes</h1>
<!-- table table-striped table-bordered nowrap -->
<table >
    <thead>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Correo</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        </tr>
    </tbody>
</table>

<style>
.page-break {
    page-break-after: always;
}
</style>
<h1>Página 1</h1>
<div class="page-break"></div>
<h1>Página 2</h1>