<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
</head>

<body class="antialiased">

    <div class="container ">

        <br>
        <div class=" d-flex justify-content-between align-items-center mb-3" style="color: #06476F">
            <img src="https://static.wixstatic.com/media/6ef527_29b85ca4ebb94433808fa7b4a9ce7865~mv2.png/v1/fill/w_183,h_73,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/2.png" style="width: 30%" alt="">

            <h3 ><strong>Orcas Task</strong> </h3>

        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Avatar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->firstName }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->avatar }} </td>
                    </tr>
                @endforeach
            </tbody>


        </table>
        <div class="d-flex justify-content-center mt-2">
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>
</body>

</html>
