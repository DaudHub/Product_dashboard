let error = false

document.getElementById("submitButton").addEventListener("click", () => {

    if (imgInput.files.length < 1) {
        alert("An image is required")
        error = true
    } else if (document.getElementById("nameInput").value.length < 1) {
        alert("The name is required")
        error=true
    } else if (document.getElementById("categoryInput").value.length < 1) {
        alert("The category is required")
        error = true
    } else if (document.getElementById("stockInput").value.length < 1) {
        alert("The stock is required")
        error = true
    } else if (document.getElementById("priceInput").value.length < 1) {
        alert("The price is required")
        error = true
    }

    const imagen = imgInput.files[0]
    const name = document.getElementById("nameInput").value
    const category = document.getElementById("categoryInput").value
    const stock = document.getElementById("stockInput").value
    const price = document.getElementById("priceInput").value
    const status = document.getElementById("statusInput").checked


    const formData = new FormData()
    formData.append("imgInput", imagen)
    formData.append("nameInput", name)
    formData.append("categoryInput", category)
    formData.append("priceInput", price)
    formData.append("statusInput", status)

    if (!error) {
        $.ajax({
            type: "post",
            url: "./methods/addProduct.php",
            data: formData,
            processData: false,
            contentType: false,
            success: (response) => {
                switch (response) {
                    case "name":
                        alert("Name input is required")
                        break
                    case "category":
                        alert("Category input is required")
                        break
                    case "price":
                        alert("Price input is required")
                        break
                    case "stock":
                        alert("Stock input is required")
                        break
                    case "1":
                        alert("File uploaded is not an image.")
                        break
                    case "2":
                        alert("Sorry, image already exists.")
                        break
                    case "3":
                        alert("Sorry, your image is too large.")
                        break
                    case "4":
                        alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.")
                        break
                    case "5":
                        alert("Sorry, your image was not uploaded.")
                        break
                    case "6":
                        alert("Sorry, there was an error uploading your image.")
                        break
                    case "0":
                        alert("Uploaded Correctly.")
                        break
                    default:
                        console.log(response)
                }
            }
        })
    }
})