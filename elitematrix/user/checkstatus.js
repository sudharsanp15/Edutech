function checkStatus(action) {
    fetch('../backend/checkstatus.php')
        .then(response => response.json())
        .then(data => {
            if (data.status === 'confirmed') {
                if (action === 'quiz') {
                    window.open('quiz_page.php', '_blank');
                } else if (action === 'practice') {
                    window.open('practice_questions.php', '_blank');
                } else if (action === 'compiler') {
                    window.open('compiler.php', '_blank');
                } else if (action === 'mylearning') {
                    window.open('mylearning.php', '_blank');
                }
            } else {
                alert('Please register for the course and complete the payment.');
            }
        })
        .catch(error => console.error('Error:', error));
}