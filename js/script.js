document.getElementById('dashboard-btn').onclick = () => {
    window.location.href = "dashboard.html";
}

document.addEventListener("DOMContentLoaded", function () {
    function fetchUpdates() {
        fetch('../mjcorpuz/php/update_check.php')
            .then(response => response.json())
            .then(data => {
                // Update Home Section
                document.getElementById('hero-title').textContent = data.home.brand_name;
                document.getElementById('hero-description').textContent = data.home.brand_description;
                document.getElementById('logo').src = data.home.background_image_url;

                // Update Contact Section
                document.querySelector('#contact .projects-title').textContent = data.contact.heading_title;
                document.querySelector('#contact .projects-description').textContent = data.contact.heading_description;

                // Update Skills Section
                const skillsGrid = document.querySelector('.skills-grid');
                skillsGrid.innerHTML = ''; // Clear the existing skills
                data.skills.forEach(skill => {
                    const skillBlock = document.createElement('div');
                    skillBlock.className = 'skills-block';
                    skillBlock.innerHTML = `
                        <img class="skills-img" src="${skill.skill_image_url}" alt="${skill.skill_title}">
                        <p class="skills-title">${skill.skill_title}</p>
                        <p class="skills-description">${skill.skill_description}</p>
                    `;
                    skillsGrid.appendChild(skillBlock);
                });

                // Update Projects Section
                const projectsContainer = document.querySelector('.projects-container');
                projectsContainer.innerHTML = ''; // Clear the existing projects
                data.projects.forEach(project => {
                    const projectGrid = document.createElement('div');
                    projectGrid.className = 'projects-grid';
                    projectGrid.innerHTML = `
                        <img class="projects-img" src="${project.project_image_url}" alt="${project.project_title}">
                        <div class="projects-right-block">
                            <p class="projects-title">${project.project_title}</p>
                            <p class="projects-description">${project.project_description}</p>
                            <button class="projects-btn">View project</button>
                        </div>
                    `;
                    projectsContainer.appendChild(projectGrid);
                });
            })
            .catch(error => console.error('Error fetching updates:', error));
    }

    // Fetch updates every 10 seconds
    setInterval(fetchUpdates, 10000);
    fetchUpdates(); // Initial fetch
});
