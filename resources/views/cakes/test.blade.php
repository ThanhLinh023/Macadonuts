@extends('layouts.app')
@section('title', 'Menu')
@section('content')

    <section class="option-bar bg-dark text-warning pt-5 pb-0 mt-5">
        <div class="container tex-md-left">
            <div class="row tex-center text-md-left">
                hello
            </div>
        </div>
    </section>

    <body>
        <header>
            <a href="#" class="logo">ActiveLink.</a>
            <nav>
                <a href="#home" class="active">Home</a>
                <a href="#about">About</a>
                <a href="#services">Services</a>
                <a href="#portfolio">Portfolio</a>
                <a href="#contact">Contact</a>
            </nav>
        </header>
        <section id="home">Home</section>
        <section id="about">About</section>
        <section id="services">Services</section>
        <section id="portfolio">Portfolio</section>
        <section id="contact">Contact</section>
        <script src="script.js"></script>
    </body>


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: 'Poppins', sans-serif;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 20px 120px;
            background: #11141a;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 100;
        }

        .logo {
            font-size: 25px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        nav a {
            font-size: 18px;
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            margin-left: 35px;
            transition: .3s;
        }

        nav a:hover,
        nav a.active {
            color: #0ef;
        }

        section {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #1f242d;
            font-size: 100px;
            color: #fff;
            font-weight: 700;
        }

        section:nth-child(odd) {
            background: #323946;
        }
    </style>

    <script>
        let sections = document.querySelectorAll('section');
        let navLinks = document.querySelectorAll('header nav a');
        window.onscroll = () => {
            sections.forEach(sec => {
                let top = window.scrollY;
                let offset = sec.offsetTop - 150;
                let height = sec.offsetHeight;
                let id = sec.getAttribute('id');
                if (top >= offset && top < offset + height) {
                    navLinks.forEach(links => {
                        links.classList.remove('active');
                        document.querySelector('header nav a[href*=' + id + ']').classList.add(
                            'active');
                    });
                };
            });
        };
    </script>
@endsection
