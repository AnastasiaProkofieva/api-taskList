<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="SwaggerUI" />
    <title>SwaggerUI</title>
    <link rel="stylesheet" href="{{ asset('swagger/swagger-ui.css') }}" />
</head>
<body>
<div id="swagger-ui"></div>
<script src="{{ asset('swagger/swagger-ui-bundle.js') }}" crossorigin></script>
<script>
    window.onload = () => {
        window.ui = SwaggerUIBundle({
            url: '{{ asset('swagger/openapi.json') }}' ,
            dom_id: '#swagger-ui',
        });
    };
</script>
</body>
</html>

