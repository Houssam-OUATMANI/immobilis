const alerts = document.querySelectorAll(".alert")
alerts.forEach(alert => {
    setTimeout( () => {
        alert.remove();
    }, 5000)
})

new TomSelect("select", {

})
new TomSelect("select[multiple]", {
    plugins: {
        remove_button:{
            title:'Retirer',
        }
    },
})


