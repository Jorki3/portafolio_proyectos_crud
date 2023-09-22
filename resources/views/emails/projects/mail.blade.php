<div style="text-align: center">
    <h1>{{ $h1 }}</h1>

    <h2>Proyecto: {{ $project->title }}</h2>

    <p>
        Descripción: {{ $project->description }} <br>
        Estado: {{ $project->isPublic ? 'Público' : 'Borrador' }}
    </p>
</div>
