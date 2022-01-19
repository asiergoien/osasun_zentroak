<template>
    <footer class="myfooter d-flex flex-wrap justify-content-between align-items-center py-3 mt-3 border-top bg-primary">
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                          </a>
            <span class="text-light">Copyright © 2022 Osasun Zentroak </span>
        </div>

        <div id="RedesSociales">
            <a href="https://www.facebook.com/Osakidetza/"><i class="fab fa-facebook-square" style="color: white"></i></a>
            <a href="https://twitter.com/osakidetzaEJGV"><i class="fab fa-twitter" style="color: white"></i></a>
            <a href="https://www.instagram.com/osakidetzaejgv/"><i class="fab fa-instagram" style="color: white"></i></a>
            <a href="https://www.youtube.com/channel/UC7uEj276GdnwRtXtt2-NwFQ"><i class="fab fa-youtube" style="color: white"></i></a>
        </div>
    </footer>
</template>

<script>
export default {
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
