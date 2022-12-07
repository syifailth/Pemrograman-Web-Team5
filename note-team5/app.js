class App {
    constructor() {
      this.$placeholder = document.querySelector("#placeholder");
      this.$form = document.querySelector("#form");
      this.$noteTitle = document.querySelector("#note-title");
      this.$noteText = document.querySelector("#note-text");
      this.$formButtons = document.querySelector("#form-buttons");
      this.$formCloseButton = document.querySelector("#form-close-button");
      this.$modal = document.querySelector(".modal");
      this.$modalTitle = document.querySelector(".modal-title");
      this.$modalText = document.querySelector(".modal-text");
      this.$modalCloseButton = document.querySelector(".modal-close-button");
      this.addEventListeners();
    }
  
    addEventListeners() {
      document.body.addEventListener("click", event => {
        this.handleFormClick(event);//form 
        this.selectNote(event);//placeholder di form isi
        this.openModal(event);//form isi
      });
  
      this.$formCloseButton.addEventListener("click", event => {
        event.stopPropagation();
        this.closeForm();
      });//close awal
  
      this.$modalCloseButton.addEventListener("click", event => {
        this.closeModal(event);
      }); //close isi
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
  
    openModal(event) {
      if (event.target.matches('.toolbar-delete')) return;  
        
      if (event.target.closest(".note")) {
        this.$modal.classList.toggle("open-modal");
        this.$modalTitle.value = this.title;
        this.$modalText.value = this.text;
      }
    }//buka form isi
  
    closeModal(event) {
      this.editNote();
      this.$modal.classList.toggle("open-modal");
    }//close form isi
    
  
    editNote() {
    }//close isi form
  
  
    selectNote(event) {
      const $selectedNote = event.target.closest(".note");
      if (!$selectedNote) return;
      const [$noteTitle, $noteText] = $selectedNote.children;
      this.title = $noteTitle.innerText;
      this.text = $noteText.innerText;
      this.id = $selectedNote.dataset.id;
    }//open from isi
    
    
    render() {
      this.saveNotes();
    }
    
    saveNotes() {
      localStorage.setItem('notes', JSON.stringify(this.notes))  
    }//buka form 22nya
  }
  
  new App();