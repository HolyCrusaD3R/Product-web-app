"use strict";

window.addEventListener('load', () => {
   let checks = Array.from(document.querySelectorAll(".checkbox"));
   let del = [];

   const delBtn = document.querySelector("#mass-delete");

   delBtn.addEventListener('click', () => {
      if(del.length !== 0)
      {
         const data = {
            "SKUs": del
         };
         fetch(window.location.href, {
            method: "POST",
            headers: {
               'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
         }).then(res => {
            console.log("Request complete! response:", res);
         });
         console.log(JSON.stringify(data));
         //console.log(sql_query);
         window.location.reload();
      }
   });

   checks.map(check => {
      check.addEventListener('change', () => {
         if(check.checked)
         {
            del.push(check.id);
            console.log(del);
         }
         else
         {
            del = del.filter(id => id!==check.id);
            console.log(del);
         }
      });
   });
});