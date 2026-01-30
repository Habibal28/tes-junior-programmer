<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title', 'ProductManager')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6777ef',
                        'background-light': '#f4f6f9',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-background-light min-h-screen text-gray-800">

    <!-- ================= NAVBAR ================= -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="container mx-auto px-6">
            <div class="flex h-16 items-center justify-between">

                <div class="flex items-center gap-10">

                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined text-3xl text-primary">
                            inventory_2
                        </span>
                        <span class="text-primary text-xl font-bold">
                            ProductManager
                        </span>
                    </div>

                    <a href="{{ route('dashboard.index') }}"
                        class="text-sm font-semibold py-5
                       {{ request()->routeIs('dashboard.index') ? 'text-primary border-b-2 border-primary' : 'text-gray-600 hover:text-primary' }}">
                        Dashboard
                    </a>

                    <a href="{{ route('produk.index') }}"
                        class="text-sm font-semibold py-5
                       {{ request()->routeIs('produk.index*') ? 'text-primary border-b-2 border-primary' : 'text-gray-600 hover:text-primary' }}">
                        Manajemen Produk
                    </a>

                    </nav>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right">
                        <p class="text-xs font-semibold text-gray-800">
                            Admin User
                        </p>
                        <p class="text-[10px] text-gray-500">
                            Administrator
                        </p>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-gray-300"></div>
                </div>

            </div>
        </div>
    </header>
    <!-- ================= END NAVBAR ================= -->

    <!-- ================= MAIN CONTENT ================= -->
    <main class="container mx-auto px-6 py-8">
        @yield('content')
        <form id="delete-form" method="POST" class="hidden">
            @csrf
            @method('DELETE')
        </form>
    </main>

    <!-- ================= END MAIN ================= -->

    <!-- ================= FOOTER ================= -->
    <footer class="text-center text-gray-400 text-xs py-6">
        © {{ date('Y') }} <span class="text-primary font-semibold">ProductManager</span>
    </footer>
    <!-- ================= END FOOTER ================= -->

    @stack('scripts')
</body>

</html>