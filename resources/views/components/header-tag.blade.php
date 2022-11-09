<meta charset="UTF-8">
<meta name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Woodside Academy</title>

{{--css--}}
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
<link rel="shortcut icon" href="{{asset('icons/briefcase.png')}}" type="image/x-icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300;1,400&display=swap"
      rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

{{--scripts--}}
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            colors: {
                'blue': '#9BA59C',
                'gray': '#BABDB2',
                'gray-op': 'rgba(186,189,178,2)',
                'brown': '#E7A164',
                'green': '#084C61',
                'green-op': 'rgba(8,76,97,0.9)',
                'green-op-1': 'rgba(8,76,97,2)',
            },
            extend: {
                spacing: {
                    'space-0.1': '10px',
                    'space-0.2': '20px',
                    'space-0.3': '30px',
                    'space-0.5': '50px',
                    'space-0.9': '90px',

                    'space-1.0': '100px',
                    'space-1.5': '150px',

                    'space-2.0': '200px',
                    'space-2.35': '235px',

                    'fit': 'fit',

                    '50-p': '50%,',
                    '90-p': '90%',
                    '100-p': '100%,',
                    'v-w': '100vw',
                    'v-h': '100vh',
                },
                borderRadius: {
                    '4xl': '2rem',
                },
                boxShadow: {
                    'main': 'rgba(0, 0, 0, 0.5) 0px 25px 50px -12px',
                }
            }
        }
    }
</script>

