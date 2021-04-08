function gradient(tag, to, first, second, round = false)
{
    $(tag).addClass("bg-gradient-to-" + to + " from-" + first + " to-" + second);
    
    round ? $(tag).addClass("hover:from-" + second + " hover:to-" + first) : '';
}

// Modals and more
gradient(".modal_add", "r", "blue-800", "blue-900");

// Form
$(".input").addClass(`bg-transparent border-1 border-gray-500 appearance-none leading-tight w-full px-4 py-2 rounded
                        focus:outline-none focus:border-gray-700`
                    );

$(".is-invalid").addClass("border-red-500 focus:border-red-600");

$(".input_dark").addClass(`bg-gray-900 text-gray-400 border-1 border-gray-800 w-full px-4 py-2 rounded
                        focus:text-gray-400 focus:outline-none focus:border-gray-800`
);

// Cuadros
$(".pic").addClass(`bg-gray-200 container rounded shadow-xl text-black w-full md:w-1/2 lg:w-1/2 xl:w-1/4`);

// Icons
$("i").addClass("my-1 mx-2");

// Cols and Rows
$(".col").addClass("col-xs-12 col-sm-12");

// Titles font size: h1, h2...
for (let i = 1; i <= 6; i++) $("h" + i).addClass("h" + i);

// Buttons
$(".button").addClass('rounded text-gray-900 px-4 py-2');