document.addEventListener("DOMContentLoaded", function () {
    console.log("Theme script loaded!");

    const themeToggleBtn = document.querySelector(".nav-link-style");
    if (!themeToggleBtn) {
        console.error("Theme toggle button not found!");
        return;
    }

    console.log("Theme toggle button found!");

    function setTheme(theme) {
        document.cookie = `theme=${theme}; path=/; SameSite=Lax`;
        document.documentElement.classList.toggle("dark-layout", theme === "dark");
        themeToggleBtn.innerHTML = `<i class="ficon" data-feather="${theme === 'dark' ? 'sun' : 'moon'}"></i>`;
        feather.replace();
        console.log(`Theme changed to: ${theme}`);
    }

    function getCookie(name) {
        const cookies = document.cookie.split("; ").reduce((acc, cookie) => {
            const [key, value] = cookie.split("=");
            acc[key] = value;
            return acc;
        }, {});
        return cookies[name] || "light";
    }

    // Sahifa yuklanganda cookie bo'yicha tema o'rnatiladi
    const currentTheme = getCookie("theme");
    console.log(`Loaded theme from cookie: ${currentTheme}`);
    setTheme(currentTheme);

    // Tugma bosilganda theme almashadi
    themeToggleBtn.addEventListener("click", function () {
        const newTheme = getCookie("theme") === "dark" ? "light" : "dark";
        setTheme(newTheme);
    });
});
