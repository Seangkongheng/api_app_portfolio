<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<style>
    .animated-img {
    max-width: 400px;
    animation: bounce 2s infinite; /* Apply animation */
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
        transform: translateY(0); /* Original position */
    }
    40% {
        transform: translateY(-20px); /* Move up */
    }
    60% {
        transform: translateY(-10px); /* Slightly down */
    }
}

</style>
<main class="text-center my-5">
    <img  src="{{ asset('image/notfound.png') }}" alt="Page Not Found Illustration" class="img-fluid mb-4 animated-img" style="max-width: 400px;">
    <h1 class="text-center">This Page is Lost</h1>
    <p class="text-muted">Sorry, we couldn't find the page you're looking for.</p>
</main>