"use strict";

function createLabel(dimension)
{
    let dimensionLabel = document.createElement('label');
    dimensionLabel.htmlFor = dimension;
    dimensionLabel.innerText = dimension.charAt(0).toUpperCase() + dimension.slice(1) + " (CM) ";
    return dimensionLabel;
}

function createSize(name, id, dimension=false)
{
    const el = document.createElement('input');
    el.type = 'number';
    el.id = id;
    el.value = name;
    el.pattern = "^\d*(\.\d{0,2})?$";
    el.min = "0.01";
    el.step = "0.01";
    if(!dimension)
        el.name = "size";
    else
        el.name = name;
    el.setAttribute("required", "true");
    return el;
}

window.addEventListener('load', () => {
    const size_div = document.querySelector('#size-div');
    const category = document.querySelector('#productType');
    let br1 = document.createElement("br");
    let br2 = document.createElement("br");
    let br3 = document.createElement("br");
    let switched = false;
    const mbDesc = document.createElement("p");
    const kgDesc = document.createElement("p");
    const dmDesc = document.createElement("p");

    mbDesc.innerText = "Please, input size of the DVD-disc in MBs";
    kgDesc.innerText = "Please, input weight of the Book in KGs";
    dmDesc.innerText = "Please, input dimensions of Furniture in CMs in HxWxL format";


    const sizeLabel = document.createElement('label');
    sizeLabel.htmlFor = 'size';


    const DVD_disc = createSize("DVD_disc", "size");
    const Book = createSize("Book", "weight");


    const Furniture = document.createElement('div');

    const heightLabel = createLabel('height');
    const height = createSize("height", "height",true);

    const widthLabel = createLabel('width');
    const width = createSize("width", "width", true);

    const lengthLabel = createLabel('length');
    const length = createSize("length", "length",true);

    Furniture.appendChild(heightLabel);
    Furniture.appendChild(height);
    Furniture.appendChild(br1);
    Furniture.appendChild(widthLabel);
    Furniture.appendChild(width);
    Furniture.appendChild(br2);
    Furniture.appendChild(lengthLabel);
    Furniture.appendChild(length);
    Furniture.appendChild(br3);


    category.addEventListener('change', () =>{

        if(!switched)
        {
            size_div.appendChild(sizeLabel);
            switched = true;
        }
        else
        {
            size_div.removeChild(size_div.lastChild);
            size_div.removeChild(size_div.lastChild);
        }

        switch(category.value)
        {
            case 'DVD-disc':
                sizeLabel.innerText = "Size (MB) ";
                size_div.appendChild(DVD_disc);
                size_div.appendChild(mbDesc);
                break;
            case 'Book':
                sizeLabel.innerText = "Weight (KG) ";
                size_div.appendChild(Book);
                size_div.appendChild(kgDesc);
                break;
            case 'Furniture':
                sizeLabel.innerText = "";
                size_div.appendChild(Furniture);
                size_div.appendChild(dmDesc);
                break;
        }

    });

});