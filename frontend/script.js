async function fetchCardDistribution(numPeople) {
    const errorElement = document.getElementById('error');

    errorElement.innerHTML = '';

    try {
        const response = await fetch(`http://localhost:8080/?num_people=${numPeople}`);
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        const data = await response.json();
        if (data.status === "success") {
            console.log("Cards distributed successfully:", data.data);
            displayCards(data.data);
        } else {
            console.error("Error from backend:", data.message);
            errorElement.innerHTML =`Error: ${data.message}`;
        }
    } catch (error) {
        console.error("Error fetching data:", error);
        errorElement.innerHTML ="An error occurred while fetching data. Please try again.";
    }
}

function displayCards(datareceived) {
    const resultsDiv = document.getElementById("result");
    const resultRawDiv = document.getElementById("result-raw");
    const errorElement = document.getElementById('error');

    resultsDiv.innerHTML = "<h2>Result</h2>";
    errorElement.innerHTML = '';

    resultRawDiv.innerHTML = `<h2>RAW Result</h2><pre>${JSON.stringify(datareceived, null, 2)}</pre>`;
    const rows = datareceived.map(row => row.split(','))
    rows.forEach((row, index) => {
        const personRow = document.createElement("div");
        personRow.textContent = `Person ${index + 1}: ${row}`;
        resultsDiv.appendChild(personRow);
    });
}

document.getElementById("fetchButton").addEventListener("click", () => {
    const numPeople = document.getElementById("numPeople").value;
    if (!numPeople || numPeople <= 0) {
         errorElement.innerHTML ="Please enter a valid number of people.";
        return;
    }
    fetchCardDistribution(numPeople);
});