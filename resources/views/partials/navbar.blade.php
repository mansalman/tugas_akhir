<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
    <div class="container-md">
        <a class="navbar-brand" href="/">Algoritma K-Means ||</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <a class="nav-link {{ ($title === "Dashboard") ? 'active' : '' }}" href="/">Dashboard</a>
                <a class="nav-link {{ ($title === "Variabel") ? 'active' : '' }}" href="/variabel">Manajemen
                    Variabel</a>
                <a class="nav-link  {{ ($title === "Data") ? 'active' : '' }}" href="/data">Manajemen Data</a>
                <a class="nav-link  {{ ($title === "Cluster") ? 'active' : '' }}" href="/cluster">Manajemen Cluster</a>
                <a class="nav-link  {{ ($title === "Kmeans") ? 'active' : '' }}" href="/kmeans">Metode K-Means</a>
            </div>
        </div>
    </div>
</nav>