# Card Distribution Apps
This project is a simple PHP and JavaScript application that distributes a deck of 52 cards randomly among `n` people. The application uses Docker to containerize the backend (PHP) and frontend (HTML and JavaScript).

## Features
- Distributes cards randomly among `n` people.
- Handles invalid inputs gracefully.
- Outputs cards in a specific format as required.
- Cross-Origin Resource Sharing (CORS) enabled for seamless frontend-backend communication.
- Result contained the list of cards by number of people and "Raw data result"
- The card distributed to the first person on the first row will be separated (comma), same as the second person in the second row.
- Sample result in frontend as follows:

```
Result:
Person 1: D-7,S-2,C-X
Person 2: H-4,C-7,C-A
Person 3: H-7,S-3,S-6

RAW Result:
[
  "D-7,S-2,C-X",
  "H-4,C-7,C-A",
  "H-7,S-3,S-6",
  ...
]
```

## Prerequisites

1. Docker installed on your system.
2. Basic understanding of running Docker containers.

## Folder Structure

```
project-name/
├── backend/
│   ├── Dockerfile
│   └── index.php
├── frontend/
│   ├── Dockerfile
│   ├── index.html
│   ├── script.js
│   └── style.css
├── docker-compose.yml
└── README.md
```

## Setup and Installation

1. Clone this repository:
   ```bash
   git clone <repository-url>
   cd project-name
   ```

2. Build and run the application using Docker Compose:
   ```bash
   docker-compose up --build
   ```

3. Open the frontend in your browser at:
   ```
   http://localhost:3000
   ```

4. Open the backend in your browser at:
   ```
   http://localhost:8080?num_people=<number>
   ```
   change `num_people` to any number more than 0

## Usage

1. Enter the number of people (integer) in the input field on the frontend.
2. Click "Distribute Cards" to view the results.

## Backend API

### Endpoint
`GET /index.php?num_people=<number>`

### Parameters
- `num_people` (integer): The number of people to distribute cards to.

### Response Format
Returns a JSON response with the distributed cards:

```json
{
  "status": "success",
  "message": "Cards distributed successfully",
  "data": [
    "D-X,S-J,C-2,C-K,S-9,S-2,C-3,C-A,C-X,S-3,D-5,H-4,H-9",
    "C-9,S-7,H-7,C-7,S-4,C-4,D-A,C-Q,C-8,C-J,S-6,D-Q,S-K",
    "C-6,C-5,H-8,D-8,S-5,D-3,H-6,D-J,S-8,D-6,S-A,D-2,D-K",
    "D-7,H-X,S-Q,H-K,H-5,H-Q,H-A,H-2,H-J,D-4,H-3,D-9,S-X"
  ]
}
```

## Frontend

The frontend fetches the JSON response from the backend and displays it in a user-friendly format. The results are shown as rows, each representing a person and the cards they received.

---

## Example Output

If `num_people=4`, the response could be:

**Backend JSON Response:**
```json
{
  "status": "success",
  "message": "Cards distributed successfully",
  "data": [
    "D-X,S-J,C-2,C-K,S-9,S-2,C-3,C-A,C-X,S-3,D-5,H-4,H-9",
    "C-9,S-7,H-7,C-7,S-4,C-4,D-A,C-Q,C-8,C-J,S-6,D-Q,S-K",
    "C-6,C-5,H-8,D-8,S-5,D-3,H-6,D-J,S-8,D-6,S-A,D-2,D-K",
    "D-7,H-X,S-Q,H-K,H-5,H-Q,H-A,H-2,H-J,D-4,H-3,D-9,S-X"
  ]
}
```

**Frontend Display:**
```
Result
Person 1: D-X,S-J,C-2,C-K,S-9,S-2,C-3,C-A,C-X,S-3,D-5,H-4,H-9,
Person 2: C-9,S-7,H-7,C-7,S-4,C-4,D-A,C-Q,C-8,C-J,S-6,D-Q,S-K,
Person 3: C-6,C-5,H-8,D-8,S-5,D-3,H-6,D-J,S-8,D-6,S-A,D-2,D-K,
Person 4: D-7,H-X,S-Q,H-K,H-5,H-Q,H-A,H-2,H-J,D-4,H-3,D-9,S-X"

RAW Result
[
  "D-X,S-J,C-2,C-K,S-9,S-2,C-3,C-A,C-X,S-3,D-5,H-4,H-9",
  "C-9,S-7,H-7,C-7,S-4,C-4,D-A,C-Q,C-8,C-J,S-6,D-Q,S-K",
  "C-6,C-5,H-8,D-8,S-5,D-3,H-6,D-J,S-8,D-6,S-A,D-2,D-K",
  "D-7,H-X,S-Q,H-K,H-5,H-Q,H-A,H-2,H-J,D-4,H-3,D-9,S-X"
]
```
## Error Handling

1. If no input or invalid input is provided:
   - Backend response: `Input value does not exist or value is invalid`
2. If an unexpected error occurs:
   - Backend response: `Irregularity occurred`

## Environment Details

- **Frontend**: Served using Nginx.
- **Backend**: PHP 7.4 with Apache.
- **Docker Compose**: Orchestrates both frontend and backend services.

## Time Spent
- understanding and analyzing the requirement (1-2 hours)
- backend developement (2-3 hours)
- frontend developement (1-2 hours)
- testing and refining (60-90 minutes)
- Final Adjustments and Documentation (1-2 hours)

## Author
Hana Quzaima Alias

Feel free to contact me for any questions or feedback!
