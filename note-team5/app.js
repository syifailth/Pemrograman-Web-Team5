class App {
    constructor() {
      this.$form = document.querySelector("#form");
      this.$noteTitle = document.querySelector("#note-title");
      this.$noteText = document.querySelector("#note-text");
      this.$formButtons = document.querySelector("#form-buttons");
      this.$formCloseButton = document.querySelector("#form-close-button");
      this.addEventListeners();
    }
  
    addEventListeners() {
      document.body.addEventListener("click", event => {
        this.handleFormClick(event);//form 
      });
  
      this.$formCloseButton.addEventListener("click", event => {
        event.stopPropagation();
        this.closeForm();
      });//close
    }
  
    handleFormClick(event) {
      const isFormClicked = this.$form.contains(event.target);
  
      const title = this.$noteTitle.value;
      const text = this.$noteText.value;
      const hasNote = title || text;
  
      if (isFormClicked) {
        this.openForm();
      }  else {
        this.closeForm();
      }
    }
  
    openForm() {
      this.$form.classList.add("form-open");
      this.$noteTitle.style.display = "block";
      this.$formButtons.style.display = "block";
    }//buat buka form add
  
    closeForm() {
      this.$form.classList.remove("form-open");
      this.$noteTitle.style.display = "none";
      this.$formButtons.style.display = "none";
      this.$noteTitle.value = "";
      this.$noteText.value = "";
    }
    
    saveNotes() {
      localStorage.setItem('notes', JSON.stringify(this.notes))  
    }
  }
  
  new App();