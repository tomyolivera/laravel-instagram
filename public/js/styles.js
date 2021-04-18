function gradient(tag, to, first, second, round = false)
{
    $(tag).addClass("bg-gradient-to-" + to + " from-" + first + " to-" + second);
    
    round ? $(tag).addClass("hover:from-" + second + " hover:to-" + first) : '';
}

// Loading
window.onload = () => {
    setTimeout(() => {
        $("#loading").fadeOut();
    }, 250);
}

// Form
$(".input").addClass(`bg-transparent border-1 border-gray-500 appearance-none leading-tight w-full px-4 py-2 rounded
                        focus:outline-none focus:border-gray-600`
                    );

$(".is-invalid").addClass("border-red-500 focus:border-red-600");

// Icons
$("i").addClass("my-1 mx-2");

// Cols and Rows
$(".col").addClass("col-xs-12 col-sm-12");

$("img").attr({loading: 'lazy'});

// Titles font size: h1, h2...
for (let i = 1; i <= 6; i++) $("h" + i).addClass("h" + i);

// Buttons
$(".button").addClass(`
        px-4 py-2 rounded-lg h6 text-gray-900 text-decoration-none text-center 
        transition duration-300 
        focus:outline-none
    `);

$(".button-green").addClass(`
        bg-green-300 text-gray-800 transform 
        hover:text-gray-800 hover:bg-green-400 focus:border-teal-600
    `);
    
$(".button-green-light").addClass(`
        bg-gray-200 text-gray-800 transform 
        hover:text-green-900 hover:bg-green-200 focus:border-teal-600
    `);

$(".button-blue-light").addClass(`
        bg-blue-200 text-blue-600 transform 
        hover:text-blue-800 hover:bg-blue-300 focus:border-blue-700
    `);

$(".button-yellow-light").addClass(`
        bg-yellow-200 text-yellow-600 transform 
        hover:text-yellow-800 hover:bg-yellow-300 focus:border-yellow-700
    `);

$(".button-red-light").addClass(`
        bg-red-200 text-red-700 transform 
        hover:text-red-800 hover:bg-red-300 focus:border-red-700
    `);