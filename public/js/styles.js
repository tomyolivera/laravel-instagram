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

// Cuadro
$(".pic").addClass(`bg-white container rounded shadow-xl text-black w-full md:w-1/2 lg:w-1/2 xl:w-1/4`);

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
        bg-green-400 text-black transform
        hover:text-white hover:bg-green-700
    `);
    
$(".button-green-light").addClass(`
        bg-gray-200 text-gray-800 transform 
        hover:text-green-900 hover:bg-green-200
    `);

$(".button-blue").addClass(`
        bg-blue-500 text-white transform
        hover:text-white hover:bg-blue-700
    `);

$(".button-blue-light").addClass(`
        bg-blue-200 text-blue-600 transform 
        hover:text-blue-800 hover:bg-blue-300
    `);

$(".button-yellow-light").addClass(`
        bg-yellow-200 text-yellow-600 transform 
        hover:text-yellow-800 hover:bg-yellow-300
    `);

$(".button-red-light").addClass(`
        bg-red-200 text-red-700 transform 
        hover:text-red-800 hover:bg-red-300
    `);

$(".button-red").addClass(`
        bg-red-600 text-white transform 
        hover:bg-red-800 focus:border-red-900
    `);