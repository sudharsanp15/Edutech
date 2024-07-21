
/* ------------------------------------------------------------------------- 
  Payment terms and condition alert
--------------------------------------------------------------------------- */
// Function to show terms and conditions in an alert
function showTerms() {
    var terms = "Terms and Conditions:\n\n" +
                "All Course registration are final. We do not offer refunds for any course purchases.\n\n" +
                "By submitting this form, you agree to abide by our terms and conditions.";
                
    alert(terms);
}

// Function to handle form submission
function submitForm() {
    // Display a confirmation alert
    alert('Form submitted successfully!\n\n' +
          "Please Check my learning page for your confirmation after 24Hrs"
    );
}
