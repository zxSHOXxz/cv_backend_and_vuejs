<?php

use App\Models\Education;
use App\Models\Eductaion;
use App\Models\Experience;
use App\Models\HomePage;
use App\Models\PersonalInformation;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\User;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use Spatie\Permission\Models\Role;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('dashboard'));
});

// Home > Dashboard
Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Dashboard > User Management
Breadcrumbs::for('user-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User Management', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users
Breadcrumbs::for('user-management.users.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Users', route('user-management.users.index'));
});

// Home > Dashboard > User Management > Users > [User]
Breadcrumbs::for('user-management.users.show', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('user-management.users.index');
    $trail->push(ucwords($user->name), route('user-management.users.show', $user));
});

// Home > Dashboard > User Management > Roles
Breadcrumbs::for('user-management.roles.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Roles', route('user-management.roles.index'));
});

// Home > Dashboard > User Management > Roles > [Role]
Breadcrumbs::for('user-management.roles.show', function (BreadcrumbTrail $trail, Role $role) {
    $trail->parent('user-management.roles.index');
    $trail->push(ucwords($role->name), route('user-management.roles.show', $role));
});

// Home > Dashboard > User Management > Permission
Breadcrumbs::for('user-management.permissions.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user-management.index');
    $trail->push('Permissions', route('user-management.permissions.index'));
});

// Home > Dashboard > Project Management
Breadcrumbs::for('project-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Project Management', route('projects.index'));
});

// Home > Dashboard > Project Management > Projects
Breadcrumbs::for('project-management.projects.index', function (BreadcrumbTrail $trail) {
    $trail->parent('project-management.index');
    $trail->push('Projects', route('projects.index'));
});

// Home > Dashboard > Project Management > Tags
Breadcrumbs::for('project-management.tags.index', function (BreadcrumbTrail $trail) {
    $trail->parent('project-management.index');
    $trail->push('Tags', route('tags.index'));
});


// Home > Dashboard > Project Management > Projects > [Project]
Breadcrumbs::for('project-management.projects.show', function (BreadcrumbTrail $trail, Project $project) {
    $trail->parent('project-management.projects.index');
    $trail->push(ucwords($project->name), route('projects.show', $project));
});


// Home > Dashboard > Testimonial Management
Breadcrumbs::for('testimonial-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Testimonial Management', route('testimonials.index'));
});

// Home > Dashboard > Testimonial Management > Testimonials
Breadcrumbs::for('testimonial-management.testimonials.index', function (BreadcrumbTrail $trail) {
    $trail->parent('testimonial-management.index');
    $trail->push('Testimonials', route('testimonials.index'));
});
// Home > Dashboard > Testimonial Management > Testimonials > [Testimonial]
Breadcrumbs::for('testimonial-management.testimonials.show', function (BreadcrumbTrail $trail, Testimonial $testimonial) {
    $trail->parent('testimonial-management.testimonials.index');
    $trail->push(ucwords($testimonial->name), route('testimonials.show', $testimonial));
});


// Home > Dashboard > Skill Management
Breadcrumbs::for('skill-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Skill Management', route('skills.index'));
});
// Home > Dashboard > Skill Management > Skills
Breadcrumbs::for('skill-management.skills.index', function (BreadcrumbTrail $trail) {
    $trail->parent('skill-management.index');
    $trail->push('Skills', route('skills.index'));
});
// Home > Dashboard > Skill Management > Skills > [Skill]
Breadcrumbs::for('skill-management.skills.show', function (BreadcrumbTrail $trail, Skill $skill) {
    $trail->parent('skill-management.skills.index');
    $trail->push(ucwords($skill->name), route('skills.show', $skill));
});


// Home > Dashboard > Service Management
Breadcrumbs::for('service-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Service Management', route('services.index'));
});
// Home > Dashboard > Service Management > Services
Breadcrumbs::for('service-management.services.index', function (BreadcrumbTrail $trail) {
    $trail->parent('service-management.index');
    $trail->push('Services', route('services.index'));
});
// Home > Dashboard > Service Management > Services > [Service]
Breadcrumbs::for('service-management.services.show', function (BreadcrumbTrail $trail, Service $service) {
    $trail->parent('service-management.services.index');
    $trail->push(ucwords($service->name), route('services.show', $service));
});


// Home > Dashboard > Experience Management
Breadcrumbs::for('experience-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Experience Management', route('experiences.index'));
});
// Home > Dashboard > Experience Management > Experiences
Breadcrumbs::for('experience-management.experiences.index', function (BreadcrumbTrail $trail) {
    $trail->parent('experience-management.index');
    $trail->push('Experiences', route('experiences.index'));
});
// Home > Dashboard > Experience Management > Experiences > [Experience]
Breadcrumbs::for('experience-management.experiences.show', function (BreadcrumbTrail $trail, Experience $experience) {
    $trail->parent('experience-management.experiences.index');
    $trail->push(ucwords($experience->name), route('experiences.show', $experience));
});


// Home > Dashboard > Education Management
Breadcrumbs::for('education-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Education Management', route('educations.index'));
});
// Home > Dashboard > Education Management > Educations
Breadcrumbs::for('education-management.educations.index', function (BreadcrumbTrail $trail) {
    $trail->parent('education-management.index');
    $trail->push('Educations', route('educations.index'));
});
// Home > Dashboard > Education Management > Educations > [Education]
Breadcrumbs::for('education-management.educations.show', function (BreadcrumbTrail $trail, Eductaion $education) {
    $trail->parent('education-management.educations.index');
    $trail->push(ucwords($education->name), route('educations.show', $education));
});


// Home > Dashboard > Personal Information Management
Breadcrumbs::for('personal-information-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Personal Information Management', route('personal-information.index'));
});
// Home > Dashboard > Personal Information Management > Personal Informations
Breadcrumbs::for('personal-information-management.personal-information.index', function (BreadcrumbTrail $trail) {
    $trail->parent('personal-information-management.index');
    $trail->push('Personal Informations', route('personal-information.index'));
});
// Home > Dashboard > Personal Information Management > Personal Informations > [Personal Information]
Breadcrumbs::for('personal-information-management.personal-informations.show', function (BreadcrumbTrail $trail, PersonalInformation $personal_information) {
    $trail->parent('personal-information-management.personal-information.index');
    $trail->push(ucwords($personal_information->name), route('personal-informations.show', $personal_information));
});


// Home > Dashboard > Home Page Management
Breadcrumbs::for('home-page-management.index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Home Page Management', route('home-page.index'));
});
// Home > Dashboard > Home Page Management > Home Page
Breadcrumbs::for('home-page-management.home-page.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home-page-management.index');
    $trail->push('Home Pages', route('home-page.index'));
});
// Home > Dashboard > Home Page Management > Home Page > [Home Page]
Breadcrumbs::for('home-page-management.home-pages.show', function (BreadcrumbTrail $trail, HomePage $home_page) {
    $trail->parent('home-page-management.home-page.index');
    $trail->push(ucwords($home_page->name), route('home-page.show', $home_page));
});
