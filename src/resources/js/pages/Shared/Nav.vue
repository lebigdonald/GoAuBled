<template>
    <div>
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <inertia-link class="nav-link" :href="$route('admin.home')">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </inertia-link>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsUsers" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Admins
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsUsers" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <inertia-link class="nav-link" :href="$route('users.create')">Add new</inertia-link>
                    <inertia-link class="nav-link" :href="$route('users.index')">Users</inertia-link>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsTables" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Tables
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsTables" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <inertia-link class="nav-link" :href="$route('admin.posts.index')">Posts</inertia-link>
                    <inertia-link class="nav-link" :href="$route('admin.users.index')">Users</inertia-link>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Pages Settings</div>

            <div class="sb-sidenav-menu-nested nav">
                <a class="nav-link p-0" :href="$route('home.edit')">Home</a>
            </div>

            <div class="sb-sidenav-menu-nested nav">
                <a class="nav-link p-0" :href="$route('posts.delete')">Delete all posts</a>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFaq" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                FAQ
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseFaq" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <inertia-link class="nav-link" :href="$route('category.index')">Add Category</inertia-link>
                    <inertia-link class="nav-link" :href="$route('question.index')">Add Question</inertia-link>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFooter" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Footer
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseFooter" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <inertia-link class="nav-link" :href="$route('frontend.about.create')">About</inertia-link>
                    <inertia-link class="nav-link" :href="$route('frontend.principes.create')">principes</inertia-link>
                    <inertia-link class="nav-link" :href="$route('frontend.termsOfservice.create')">termsOfservice</inertia-link>
                    <inertia-link class="nav-link" :href="$route('frontend.impressum.create')">impressum</inertia-link>
                    <inertia-link class="nav-link" :href="$route('frontend.agb.create')">agb</inertia-link>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Images
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <inertia-link class="nav-link" :href="$route('images.create')">Importer</inertia-link>
                    <inertia-link class="nav-link" :href="$route('images.index')">Galerie</inertia-link>
                </nav>
            </div>
        </div>
    </div>
</template>
