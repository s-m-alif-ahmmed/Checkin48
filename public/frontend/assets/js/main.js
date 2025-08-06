$(document).ready(function() {
  const testimonialCarousel = $('.testimonial-carousel');
  if (testimonialCarousel.length > 0)
    testimonialCarouselFunc(testimonialCarousel);
  
    $('.select2').select2({
      minimumResultsForSearch: Infinity,
    });


  $('.searchSelect').select2();
});

document.addEventListener('DOMContentLoaded', () => {

  const aboutVideo = document.getElementById('about-video');
  if (aboutVideo) videoPlayPause(aboutVideo);

  const rangeWrappers = document.querySelectorAll('.range-wrapper');
  if (rangeWrappers.length > 0) doubleRange(rangeWrappers);

  const sidebar = document.querySelector('.sidebar');
  if (sidebar) sidebarFunc(sidebar);

  const copyBtns = document.querySelectorAll('.copy-btn');
  if (copyBtns.length > 0) copyLink(copyBtns);

  const passwordWrappers = document.querySelectorAll('.password-wrapper');
  if (passwordWrappers.length > 0) passwordField(passwordWrappers);

  const notificationBtn = document.querySelector('#notification-btn');
  if (notificationBtn) notificationFunc(notificationBtn);

  const profileUploadContainers = document.querySelectorAll(
    '.profile-upload-container'
  );
  if (profileUploadContainers.length > 0)
    profileUpload(profileUploadContainers);

  const navMain = document.querySelector('.nav-main');
  if (navMain) navMainFunc(navMain);

  // lang select
  const langSelect = document.querySelector('.lang-select');
  if(langSelect) {
    const langChangeBtn = langSelect.querySelector('.change-btn');
    const langChangeBtnSpan = langChangeBtn.querySelector('span');
    const langValue = langSelect.querySelector('.lang-value');
    const langSelectDropdown = langSelect.querySelector('.lang-dropdown');
    const langSelectDropdownItems =
      langSelectDropdown.querySelectorAll('.lang-item');
  
    langChangeBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      e.preventDefault();
      if (langSelectDropdown.classList.contains('show')) {
        langSelectDropdown.classList.remove('show');
        langChangeBtn.classList.remove('show');
      } else {
        langSelectDropdown.classList.add('show');
        langChangeBtn.classList.add('show');
      }
    });
  
    langSelectDropdownItems.forEach((langSelectDropdownItem) => {
      langSelectDropdownItem.addEventListener('click', function (e) {
        e.stopPropagation();
        e.preventDefault();
        langSelectDropdown.classList.remove('show');
        langSelectDropdownItems.forEach((subLangSelectDropdownItem) => {
          subLangSelectDropdownItem.classList.remove('active');
        });
        langSelectDropdownItem.classList.add('active');
        langChangeBtn.classList.toggle('show');
        langChangeBtnSpan.textContent = this.dataset.lang;
        langValue.value = this.dataset.lang;
        const inputEvent = new Event('input', {
          bubbles: false,
          cancelable: false,
        });
        langValue.dispatchEvent(inputEvent);
      });
    });
  
    document.addEventListener('click', function (e) {
      if (!langSelect.contains(e.target)) {
        langSelectDropdown.classList.remove('show');
        langChangeBtn.classList.remove('show');
      }
    });
  }

  const tableActionContainers = document.querySelectorAll(
    '.table-action-container'
  );
  if (tableActionContainers.length > 0) tableDropdown(tableActionContainers);

  const mediaUploadContainers = document.querySelectorAll(
    '.media-upload-container'
  );
  if (mediaUploadContainers.length > 0) {
    mediaUploadContainers.forEach((mediaUploadContainer) => {
      mediaUploadContainerFunc(mediaUploadContainer);
    });
  }

  const searchInputBtn = document.querySelector(
    '.dashboard-search-input .toggle-btn'
  );
  const searchInput = document.querySelector('.dashboard-search-input input');
  if (searchInputBtn && searchInput) {
    if (window.matchMedia('(max-width: 1023px)')) {
      searchInputBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        searchInput.classList.toggle('show');
      });

      document.addEventListener('click', (e) => {
        if (
          !searchInputBtn.contains(e.target) &&
          !searchInput.contains(e.target)
        ) {
          searchInput.classList.remove('show');
        }
      });
    }
  }

  // Grab the filter icon and form container
  const filterIcon = document.querySelector('.booking-form .filter-icon');
  const bookingForm = document.querySelectorAll(
    '.booking-form .form-element.showAble'
  );

  // Add click event listener to the filter icon

  if (filterIcon) {
    filterIcon.addEventListener('click', (e) => {
      // Toggle the display style between 'none' and 'block'
      e.stopPropagation();
      bookingForm.forEach((form) => {
        form.classList.toggle('show');
      });
    });
  }

  const filterSearchButton = document.querySelector('.filter-search-button');
  if (filterSearchButton) {
    const listingFilter = document.querySelector('.listing-filters');

    let filterSearchInstance;

    if (
      !listingFilter.classList.contains('responsive-filter') ||
      window.matchMedia('(max-width: 1023px)').matches
    ) {
      filterSearchInstance = Popper.createPopper(
        filterSearchButton,
        listingFilter,
        {
          placement: 'bottom-end',
          strategy: 'absolute',
          modifiers: [
            {
              name: 'offset',
              options: {
                offset: [0, 5],
              },
            },
            {
              name: 'preventOverflow',
              options: {
                altAxis: true,
                // rootBoundary: 'document',
              },
            },
          ],
        }
      );
    }

    filterSearchButton.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      if (!listingFilter.classList.contains('show')) {
        listingFilter.classList.add('show');

        filterSearchInstance.update();
      } else {
        listingFilter.classList.remove('show');
      }
    });

    document.addEventListener('click', (e) => {
      if (!listingFilter.contains(e.target)) {
        listingFilter.classList.remove('show');
      }
    });
  }

  const featureImgBoxes = document.querySelectorAll('.feature-img-box');
  if (featureImgBoxes.length > 0) featureImgBoxFunc(featureImgBoxes);

  const peopleFormElement = document.querySelector('.people-form-element');
  if (peopleFormElement) peopleFormFunc(peopleFormElement);






  const floorPlanContainer = document.getElementById('floor-plan-container');

  if (floorPlanContainer) {
    // Add floor functionality
    floorPlanContainer.addEventListener('click', (event) => {
      if (event.target.closest('.add-floor-btn')) {
        const floorPlanItems =
          floorPlanContainer.querySelectorAll('.floor-plan-item');
        const lastFloorNumber = parseInt(
          floorPlanItems[floorPlanItems.length - 1]
            .querySelector('.floor-plan-header .title')
            .textContent.replace('Floor ', ''),
          10
        );
        const newFloorNumber = lastFloorNumber + 1;

        const newFloorPlan = floorPlanItems[0].cloneNode(true);


        // each input name update start
        newFloorPlan.querySelectorAll("[name]").forEach((inputElement) => {
          const nameAttr = inputElement.getAttribute("name")
          const firstName = nameAttr.slice(0, 7)
          const lastName = nameAttr.slice(8, nameAttr.length)

          inputElement.setAttribute("name", `${firstName}${newFloorNumber - 1}${lastName}`)
        })
        // each input name update end


        newFloorPlan.setAttribute("data-floor-id", newFloorNumber - 1)
        newFloorPlan.querySelector('.title').textContent =
          `Floor ${newFloorNumber}`;

        // Reset input values
        newFloorPlan.querySelectorAll('input, textarea').forEach((input) => {
          input.value = '';
        });

        // Remove additional rooms in the cloned floor
        newFloorPlan
          .querySelectorAll('.room-plan-item:not(:first-child)')
          .forEach((room) => {
            room.remove();
          });
        newFloorPlan.querySelector('.media-upload-images').innerHTML = '';

        newFloorPlan.querySelector('.room-plan-header .title').textContent =
          'Room 1';

        floorPlanContainer.appendChild(newFloorPlan);

        // Reinitialize the image upload functionality for the new floor
        const newFloorImageUploadContainers = newFloorPlan.querySelectorAll(
          '.media-upload-container'
        );

        newFloorImageUploadContainers.forEach(
          (newFloorImageUploadContainer) => {
            mediaUploadContainerFunc(newFloorImageUploadContainer);
          }
        );
      }

      // Remove floor functionality (delete last floor)
      if (event.target.closest('.close-btn')) {
        const floorPlanItems =
          floorPlanContainer.querySelectorAll('.floor-plan-item');
        if (floorPlanItems.length > 1) {
          const lastFloorItem = floorPlanItems[floorPlanItems.length - 1]; // Get the last floor
          lastFloorItem.remove(); // Remove it
        }
      }
    });

    // Add room functionality
    floorPlanContainer.addEventListener('click', (event) => {
      if (event.target.closest('.add-room-btn')) {
        const roomContainer = event.target
          .closest('.floor-plan-item')
          .querySelector('.room-plan-form-container');
        const roomItems = roomContainer.querySelectorAll('.room-plan-item');
        const lastRoomNumber = parseInt(
          roomItems[roomItems.length - 1]
            .querySelector('.room-plan-header .title')
            .textContent.replace('Room ', ''),
          10
        );
        const newRoomNumber = lastRoomNumber + 1;

        const newRoom = roomItems[0].cloneNode(true);
        newRoom.setAttribute("data-room-id", newRoomNumber - 1)
        newRoom.querySelector('.room-plan-header .title').textContent =
          `Room ${newRoomNumber}`;
        newRoom.querySelector('.media-upload-images').innerHTML = '';


        // each input name update start
        newRoom.querySelectorAll("[name]").forEach((inputElement) => {
          const nameAttr = inputElement.getAttribute("name")
          const firstName = nameAttr.slice(0, 17)
          const lastName = nameAttr.slice(18, nameAttr.length)

          inputElement.setAttribute("name", `${firstName}${newRoomNumber - 1}${lastName}`)
        })
        // each input name update end


        // Reset input values
        newRoom.querySelectorAll('input').forEach((input) => {
          input.value = '';
        });

        const newRoomImageUploadContainers = newRoom.querySelectorAll(
          '.media-upload-container'
        );
        newRoomImageUploadContainers.forEach((newRoomImageUploadContainer) => {
          mediaUploadContainerFunc(newRoomImageUploadContainer);
        });

        // Append the new room to the room container
        roomContainer.appendChild(newRoom);
      }

      // Remove room functionality (delete last room)
      if (event.target.closest('.room-close-btn')) {
        const roomContainer = event.target
          .closest('.floor-plan-item')
          .querySelector('.room-plan-form-container');
        const roomItems = roomContainer.querySelectorAll('.room-plan-item');
        if (roomItems.length > 1) {
          const lastRoomItem = roomItems[roomItems.length - 1]; // Get the last room
          lastRoomItem.remove(); // Remove it
        }
      }
    });

    // Function to handle image upload for floors
    function floorImageUploadFunc(floorImageUploadContainers) {
      floorImageUploadContainers.forEach((floorImageUploadContainer) => {
        const input =
          floorImageUploadContainer.querySelector('input[type="file"]');
        const uploadBtn =
          floorImageUploadContainer.querySelector('.upload-btn');
        const preview = floorImageUploadContainer.querySelector(
          '.floor-image-container'
        );

        uploadBtn.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          input.click();
        });

        floorImageUploadContainer.addEventListener('dragover', (e) => {
          e.preventDefault();
          floorImageUploadContainer.classList.add('drag-over');
        });

        floorImageUploadContainer.addEventListener('dragleave', () => {
          floorImageUploadContainer.classList.remove('drag-over');
        });

        floorImageUploadContainer.addEventListener('drop', (e) => {
          e.preventDefault();
          floorImageUploadContainer.classList.remove('drag-over');
          handleFiles(e.dataTransfer.files[0]);
        });

        input.addEventListener('change', (e) => {
          handleFiles(e.target.files[0]);
        });

        function handleFiles(file) {
          const reader = new FileReader();

          reader.onload = (event) => {
            const imageSrc = event.target.result;
            preview.innerHTML = `<img src="${imageSrc}" alt="upload image"/>`;
          };
          reader.readAsDataURL(file);
        }
      });
    }

    floorImageUploadFunc(
      floorPlanContainer.querySelectorAll('.floor-image-upload-container')
    );
  }





  const shareBtn = document.querySelector('.share-btn');
  const shareDropdown = document.querySelector('.share-dropdown');
  if (shareBtn && shareDropdown) {
    shareDropdown.style.display = 'none';

    const shareDropdownInstance = Popper.createPopper(shareBtn, shareDropdown, {
      placement: 'bottom',
      strategy: 'fixed',
      modifiers: [
        {
          name: 'offset',
          options: {
            offset: [0, 5],
          },
        },
        {
          name: 'preventOverflow',
          options: {
            altAxis: true,
            rootBoundary: 'document',
          },
        },
      ],
    });

    shareBtn.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      shareDropdownInstance.update();
      shareDropdown.style.display = 'block';
    });

    document.addEventListener('click', (e) => {
      if (!shareDropdown.contains(e.target) && !shareBtn.contains(e.target)) {
        shareDropdown.style.display = 'none';
      }
    });
  }
});

function peopleFormFunc(peopleFormElement) {
  const peopleInput = peopleFormElement.querySelector('input.people-input');
  const peopleDropdown = peopleFormElement.querySelector('.people-dropdown');

  const dropdownInstance = Popper.createPopper(peopleInput, peopleDropdown, {
    placement: 'bottom',
    strategy: 'fixed',
    modifiers: [
      {
        name: 'offset',
        options: {
          offset: [0, 10],
        },
      },
    ],
  });

  function show() {
    peopleDropdown.classList.add('show');
    dropdownInstance.update();
  }

  function hide() {
    peopleDropdown.classList.remove('show');
  }

  peopleInput.addEventListener('click', (e) => {
    e.preventDefault();
    show();
  });

  const peopleDropdownItems = peopleDropdown.querySelectorAll(
    '.people-dropdown-item'
  );

  let counts = {
    adults: 0,
    children: 0,
  };

  function updatePeopleInput() {
    const guests = counts.adults + counts.children;
    const guestText = guests > 0 ? `${guests} guests` : '';

    peopleInput.value = [guestText].filter(Boolean).join(', ');
  }

  function ensureMinimumAdults() {
    if (counts.adults === 0) {
      counts.adults += 1;
      const adultsItem = peopleDropdown.querySelector('.adults-item');
      const adultsCount = adultsItem.querySelector('.item-count');
      const adultsDecrement = adultsItem.querySelector('.decrement-count');
      const adultsIncrement = adultsItem.querySelector('.increment-count');

      adultsCount.textContent = counts.adults;
      adultsDecrement.removeAttribute('disabled');

      if (counts.adults === parseInt(adultsIncrement.dataset.limit)) {
        adultsIncrement.setAttribute('disabled', '');
      }

      updatePeopleInput();
    }
  }

  peopleDropdownItems.forEach((peopleDropdownItem) => {
    const count = peopleDropdownItem.querySelector('.item-count');
    const incrementCount = peopleDropdownItem.querySelector('.increment-count');
    const decrementCount = peopleDropdownItem.querySelector('.decrement-count');

    const itemName = peopleDropdownItem.getAttribute('data-item-name');

    decrementCount.setAttribute('disabled', '');

    let innerCountValue = parseInt(count.textContent);

    incrementCount.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();

      const limitValue = +incrementCount.dataset.limit;

      if (innerCountValue < limitValue) {
        counts[itemName] += 1;
        innerCountValue += 1;

        count.textContent =
          itemName === 'adults' ? counts.adults : innerCountValue;
        decrementCount.removeAttribute('disabled');

        if (['children', 'infants', 'pets'].includes(itemName)) {
          ensureMinimumAdults();
        }

        updatePeopleInput();

        if (innerCountValue === limitValue) {
          incrementCount.setAttribute('disabled', '');
        }
      }
    });

    decrementCount.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();

      if (innerCountValue > 0) {
        counts[itemName] -= 1;
        innerCountValue -= 1;

        count.textContent = innerCountValue;
        incrementCount.removeAttribute('disabled');

        if (itemName === 'adults' && counts.adults === 0) {
          ensureMinimumAdults();
        }

        updatePeopleInput();

        if (innerCountValue === 0) {
          decrementCount.setAttribute('disabled', '');
        }
      }
    });
  });

  document.addEventListener('click', (e) => {
    if (!peopleInput.contains(e.target) && !peopleDropdown.contains(e.target)) {
      hide();
    }
  });
}

function featureImgBoxFunc(featureImgBoxes) {
  let currentIndex = 0;

  function createPortal(imgLink) {
    const portalDiv = document.createElement('div');
    const portalOverlay = document.createElement('div');
    const portalContent = document.createElement('div');
    const img = document.createElement('img');
    const prevButton = document.createElement('button');
    const nextButton = document.createElement('button');

    // Calculate scrollbar width and apply adjustments
    const scrollbarWidth =
      window.innerWidth - document.documentElement.clientWidth;
    document.documentElement.style.marginRight = `${scrollbarWidth}px`;
    document.documentElement.classList.add('scroll-hide');

    portalDiv.setAttribute('class', 'portal-body');
    portalOverlay.setAttribute('class', 'portal-overlay');
    portalContent.setAttribute('class', 'portal-content');
    img.setAttribute('class', 'portal-feature-img');
    img.setAttribute('src', imgLink);
    img.setAttribute('alt', 'Feature img');

    prevButton.setAttribute('class', 'portal-prev-button');
    nextButton.setAttribute('class', 'portal-next-button');
    prevButton.innerText = '<'; // Left arrow
    nextButton.innerText = '>'; // Right arrow

    portalContent.appendChild(prevButton);
    portalContent.appendChild(img);
    portalContent.appendChild(nextButton);
    portalDiv.appendChild(portalContent);
    portalDiv.appendChild(portalOverlay);
    document.body.appendChild(portalDiv);

    // Function to update the image source
    function updateImage(index) {
      currentIndex = index;
      const newImgLink = featureImgBoxes[currentIndex].getAttribute('src');
      img.setAttribute('src', newImgLink);
    }

    // Previous button functionality
    prevButton.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      const prevIndex =
        (currentIndex - 1 + featureImgBoxes.length) % featureImgBoxes.length;
      updateImage(prevIndex);
    });

    // Next button functionality
    nextButton.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      const nextIndex = (currentIndex + 1) % featureImgBoxes.length;
      updateImage(nextIndex);
    });

    // Close lightbox on overlay click
    portalOverlay.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      document.documentElement.classList.remove('scroll-hide');
      document.documentElement.style.marginRight = ''; // Remove margin adjustment
      portalDiv.remove();
    });

    // Keyboard navigation
    document.addEventListener('keydown', function handleKeydown(e) {
      if (!document.documentElement.classList.contains('scroll-hide')) return;

      if (e.key === 'ArrowLeft') {
        const prevIndex =
          (currentIndex - 1 + featureImgBoxes.length) % featureImgBoxes.length;
        updateImage(prevIndex);
      } else if (e.key === 'ArrowRight') {
        const nextIndex = (currentIndex + 1) % featureImgBoxes.length;
        updateImage(nextIndex);
      } else if (e.key === 'Escape') {
        document.documentElement.remove('scroll-hide');
        document.documentElement.style.marginRight = ''; // Remove margin adjustment
        portalDiv.remove();
        document.removeEventListener('keydown', handleKeydown); // Cleanup event listener
      }
    });
  }

  featureImgBoxes.forEach((featureImgBox, index) => {
    featureImgBox.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      currentIndex = index;
      createPortal(featureImgBox.getAttribute('src'));
    });
  });
}

function mediaUploadContainerFunc(mediaUploadContainer) {
  const inputEle = mediaUploadContainer.querySelector("input[type='file']");
  const mediaUploads = mediaUploadContainer.querySelector('.media-uploads');
  const mediaUploadImages = mediaUploadContainer.querySelector(
    '.media-upload-images'
  );
  const isMultiple = mediaUploadContainer.dataset.multiple;

  // Open file input dialog on click
  mediaUploads.addEventListener('click', (e) => {
    e.stopPropagation();
    inputEle.click();
  });

  // Add drag-and-drop functionality
  mediaUploads.addEventListener('dragover', (e) => {
    e.preventDefault(); // Prevent default to allow drop
    mediaUploads.classList.add('drag-over'); // Add visual feedback
  });

  mediaUploads.addEventListener('dragleave', () => {
    mediaUploads.classList.remove('drag-over'); // Remove visual feedback
  });

  mediaUploads.addEventListener('drop', (e) => {
    e.preventDefault();
    mediaUploads.classList.remove('drag-over');

    const files = [];

    if (isMultiple === 'single') {
      mediaUploadImages.innerHTML = '';
      files.push(e.dataTransfer.files[0]);
    } else {
      files.push(...Array.from(e.dataTransfer.files));
    }
    handleFiles(files); // Handle the uploaded files
  });

  // Handle file selection through input
  inputEle.addEventListener('change', (e) => {
    const files = [];

    if (isMultiple === 'single') {
      mediaUploadImages.innerHTML = '';
      files.push(e.target.files[0]);
    } else {
      files.push(...Array.from(e.target.files));
    }
    handleFiles(files);
  });

  // Function to process files
  function handleFiles(files) {
    files.forEach((file) => {
      const reader = new FileReader();

      reader.onload = (event) => {
        const imageSrc = event.target.result; // Base64 image URL

        const imgItem = document.createElement('div');
        imgItem.classList.add('media-upload-image');

        imgItem.innerHTML = `
          <img src="${imageSrc}" alt="${file.name}" />
          <div class="overlay">
          <div class="img-name">${file.name}</div>
          </div>
          <button class="media-upload-image-delete-btn" type="button" data-prev="false">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="12"
              height="12"
              viewBox="0 0 12 12"
              fill="none"
            >
              <path
                d="M2 3.5H10M5 5.5V8.5M7 5.5V8.5M2.5 3.5L3 9.5C3 9.76522 3.10536 10.0196 3.29289 10.2071C3.48043 10.3946 3.73478 10.5 4 10.5H8C8.26522 10.5 8.51957 10.3946 8.70711 10.2071C8.89464 10.0196 9 9.76522 9 9.5L9.5 3.5M4.5 3.5V2C4.5 1.86739 4.55268 1.74021 4.64645 1.64645C4.74021 1.55268 4.86739 1.5 5 1.5H7C7.13261 1.5 7.25978 1.55268 7.35355 1.64645C7.44732 1.74021 7.5 1.86739 7.5 2V3.5"
                stroke="#1D2635"
                stroke-width="0.9"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        `;

        deleteUploadImage(imgItem);

        mediaUploadImages.appendChild(imgItem); // Append new image
      };

      reader.readAsDataURL(file); // Convert file to Base64
    });
  }

  mediaUploadImages.querySelectorAll('.media-upload-image').forEach((image) => {
    deleteUploadImage(image);
  });

  function deleteUploadImage(imageElement) {
    imageElement
      .querySelector('.media-upload-image-delete-btn')
      .addEventListener('click', function () {
        // sweetalert remove villa image
        const imageId = this.getAttribute('data-id');
        const isPrev = this.dataset.prev
        const imageContainer = document.getElementById(`villa-image-${imageId}`);

        if (!!isPrev) {
          imageElement.remove()
        } else {
          // SweetAlert2 confirmation
          Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
              // Send AJAX request to delete image
              fetch(`/owner/villa-image/delete/${imageId}`, {
                method: 'DELETE',
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
              })
                .then(response => response.json())
                .then(data => {
                  if (data.success) {
                    // SweetAlert2 success message
                    Swal.fire(
                      'Deleted!',
                      'Your image has been deleted.',
                      'success'
                    );
                    imageContainer.remove(); // Remove image from UI
                  } else {
                    // SweetAlert2 error message
                    Swal.fire(
                      'Error!',
                      'Failed to delete image: ' + data.message,
                      'error'
                    );
                  }
                })
            }
          });
        }

      });
  }
}

function tableDropdown(tableActionContainers) {
  const bodyContent = document.querySelector('.main-content');

  /**
   * Hides the given dropdown and resets scrolling.
   */
  function hideDropdown(actionDropdown) {
    actionDropdown.style.display = 'none';
    bodyContent.style.overflow = '';
  }

  /**
   * Calculates the position for the dropdown to prevent overflow.
   */
  function calculateDropdownPosition(actionDropdown, buttonRect) {
    const dropdownRect = actionDropdown.getBoundingClientRect();
    let top = buttonRect.top + buttonRect.height + 5; // Default position below the button
    let left = buttonRect.left - dropdownRect.width + buttonRect.width; // Align dropdown to the button's end

    // Adjust to prevent overflow at the bottom
    if (top + dropdownRect.height > window.innerHeight) {
      top = buttonRect.top - dropdownRect.height - 5; // Position above the button
    }

    // Adjust to prevent overflow on the left
    if (left < 0) {
      left = 10; // Add a small margin if it overflows on the left
    }

    return { top, left };
  }

  /**
   * Shows the dropdown for the specified button.
   */
  function showDropdown(tableActionContainers, actionDropdown, buttonRect) {
    // Hide all other dropdowns
    tableActionContainers.forEach((container) => {
      const dropdown = container.querySelector('.action-dropdown');
      if (dropdown) dropdown.style.display = 'none';
    });

    // Calculate and set the dropdown position
    actionDropdown.style.display = 'block';
    const { top, left } = calculateDropdownPosition(actionDropdown, buttonRect);
    actionDropdown.style.top = `${top}px`;
    actionDropdown.style.left = `${left}px`;

    // Prevent background scrolling
    bodyContent.style.overflow = 'hidden';
  }

  /**
   * Initializes event listeners for a single table action container.
   */
  tableActionContainers.forEach((tableActionContainer) => {
    const tableActionBtn =
      tableActionContainer.querySelector('.table-action-btn');
    const actionDropdown =
      tableActionContainer.querySelector('.action-dropdown');
    const dropdownItems = actionDropdown.querySelectorAll(
      '.dropdown-item .action-btn'
    );

    tableActionBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();

      const isVisible = actionDropdown.style.display === 'block';
      if (isVisible) {
        hideDropdown(actionDropdown);
      } else {
        const buttonRect = tableActionBtn.getBoundingClientRect();
        showDropdown(tableActionContainers, actionDropdown, buttonRect);
      }
    });

    dropdownItems.forEach((item) => {
      item.addEventListener('click', (e) => {
        e.stopPropagation();
        e.preventDefault();
        hideDropdown(actionDropdown);
      });
    });

    document.addEventListener('click', (e) => {
      if (
        !tableActionBtn.contains(e.target) &&
        !actionDropdown.contains(e.target)
      ) {
        hideDropdown(actionDropdown);
      }
    });
  });
}

function navMainFunc(navMain) {
  const navMenuToggle = document.querySelector('.mob-menu-toggle');
  const navMenuMob = document.querySelector('.mob-nav');
  const navOverlay = document.querySelector('.nav-overlay');
  const navMenuMovCloseBtn = document.querySelector('.mobile-nav-close-btn');

  navMenuToggle.addEventListener('click', () => {
    navMenuMob.classList.add('show');
    navOverlay.classList.add('show');
    document.body.classList.add('scroll-hide');
  });
  navOverlay.addEventListener('click', () => {
    navMenuMob.classList.remove('show');
    navOverlay.classList.remove('show');
    document.body.classList.remove('scroll-hide');
  });
  navMenuMovCloseBtn.addEventListener('click', () => {
    navMenuMob.classList.remove('show');
    navOverlay.classList.remove('show');
    document.body.classList.remove('scroll-hide');
  });

  const header = document.querySelector('header');
  let scrollHeight = 500;
  window.addEventListener('scroll', () => {
    if (window.scrollY > scrollHeight) {
      navMain.classList.add('sticky');
      header.classList.add('nav-sticky');
    } else {
      navMain.classList.remove('sticky');
      header.classList.remove('nav-sticky');
    }
  });

  
}

function profileUpload(profileUploadContainers) {
  profileUploadContainers.forEach((profileUploadContainer) => {
    // const fileInput = profileUploadContainer.querySelector('#fileInput');
    // const profileImage = profileUploadContainer.querySelector('#profileImage');
    // const uploadBtn = profileUploadContainer.querySelector('#uploadBtn');
    // const deleteBtn = profileUploadContainer.querySelector('#deleteBtn');

    const fileInput = profileUploadContainer.querySelector('.file-input');
    const profileImage = profileUploadContainer.querySelector('.profile-image');
    const uploadBtn = profileUploadContainer.querySelector('.upload-btn');
    const deleteBtn = profileUploadContainer.querySelector('.delete-btn');

    uploadBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      fileInput.click();
    });

    fileInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = () => {
          profileImage.innerHTML = `<img src="${reader.result}" alt="Profile Image" />`;
        };
        reader.readAsDataURL(file);
      }
    });

    deleteBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      profileImage.innerHTML = `<span class="profile-placeholder">No Photo</span>`;
      fileInput.value = '';
    });
  });
}

function notificationFunc(notificationBtn) {
  const notificationPanel = document.querySelector('#notification-panel');

  notificationBtn.addEventListener('click', function (e) {
    e.stopPropagation();
    e.preventDefault();
    if (notificationPanel.style.display !== 'block') {
      notificationPanel.style.display = 'block';

      const notificationBtnReact = notificationBtn.getBoundingClientRect();
      const notificationPanelReact = notificationPanel.getBoundingClientRect();

      notificationPanel.style.left = `${notificationBtnReact.left - notificationPanelReact.width + notificationBtnReact.width}px`;
      notificationPanel.style.top = `${notificationBtnReact.top + notificationBtnReact.top + 10}px`;
    } else {
      notificationPanel.style.display = 'none';
    }
  });

  document.addEventListener('click', (event) => {
    if (
      !notificationBtn.contains(event.target) &&
      !notificationPanel.contains(event.target)
    ) {
      notificationPanel.style.display = 'none';
    }
  });
}

function sidebarFunc(sidebar) {
  const toggleButton = document.querySelector('.sidebar-toggle-btn');
  toggleButton.addEventListener('click', () => {
    sidebar.classList.toggle('open');
  });
}

function passwordField(passwordWrappers) {
  passwordWrappers.forEach((passwordWrapper) => {
    const input = passwordWrapper.querySelector('input');
    const passOff = passwordWrapper.querySelector('.pass-off');
    const passOn = passwordWrapper.querySelector('.pass-on');
    const toggleBtn = passwordWrapper.querySelector('button');

    toggleBtn.addEventListener('click', function (e) {
      e.stopPropagation();
      e.preventDefault();
      if (input.getAttribute('type') === 'password') {
        input.setAttribute('type', 'text');
        passOff.classList.remove('show');
        passOn.classList.add('show');
      } else {
        input.setAttribute('type', 'password');
        passOn.classList.remove('show');
        passOff.classList.add('show');
      }
    });
  });
}

function copyLink(copyBtns) {
  copyBtns.forEach((copyBtn) => {
    const copiedAlert = copyBtn.querySelector('.copy-tooltip');

    copyBtn.addEventListener('click', (e) => {
      e.stopPropagation();
      e.preventDefault();
      const link = copyBtn.dataset.link;

      window.navigator.clipboard
        .writeText(link)
        .then(() => {
          copiedAlert.classList.add('show');
          setTimeout(() => {
            copiedAlert.classList.remove('show');
          }, 1000);
        })
        .catch((err) => {
          console.error(err);
        });
    });
  });
}

function videoPlayPause(aboutVideo) {
  const button = document.getElementById('video-figure');
  function togglePlayPause() {
    if (aboutVideo.paused) {
      aboutVideo.play();
      document.getElementById('playPauseBtn').hidden = true;
    } else {
      aboutVideo.pause();
      document.getElementById('playPauseBtn').hidden = false;
    }
  }
  button.addEventListener('click', togglePlayPause);
}

function doubleRange(rangeWrappers) {
  rangeWrappers.forEach((rangeWrapper) => {
    const minInput = rangeWrapper.querySelector('.min-range');
    const maxInput = rangeWrapper.querySelector('.max-range');
    const activeRange = rangeWrapper.querySelector('.range-active');
    const minThumb = rangeWrapper.querySelector('.thumb-min');
    const maxThumb = rangeWrapper.querySelector('.thumb-max');

    // Get the target elements
    const minTarget = document.querySelector(minInput.dataset.target);
    const maxTarget = document.querySelector(maxInput.dataset.target);

    const min = parseInt(minInput.getAttribute('min'), 10);
    const max = parseInt(maxInput.getAttribute('max'), 10);
    const step = parseInt(minInput.getAttribute('step'), 10);
    let minPrice = parseInt(minInput.value, 10) || min;
    let maxPrice = parseInt(maxInput.value, 10) || max;

    // Update the slider and target elements
    function updateRange() {
      const minThumbPosition = ((minPrice - min) / (max - min)) * 100;
      const maxThumbPosition = ((maxPrice - min) / (max - min)) * 100;

      activeRange.style.left = `${minThumbPosition}%`;
      activeRange.style.right = `${100 - maxThumbPosition}%`;

      minThumb.style.left = `${minThumbPosition}%`;
      maxThumb.style.right = `${100 - maxThumbPosition}%`;

      // Update target elements
      if (minTarget) minTarget.textContent = minPrice.toLocaleString();
      if (maxTarget) maxTarget.textContent = maxPrice.toLocaleString();
    }

    function minTrigger() {
      minPrice = Math.min(minInput.value, maxPrice - step);
      minInput.value = minPrice;
      // minPriceInput.value = minPrice;
      updateRange();
    }

    function maxTrigger() {
      maxPrice = Math.max(maxInput.value, minPrice + step);
      maxInput.value = maxPrice;
      updateRange();
    }

    // Attach event listeners
    minInput.addEventListener('input', minTrigger);
    maxInput.addEventListener('input', maxTrigger);
    updateRange();
  });
}

function testimonialCarouselFunc(testimonialCarousel) {
  const owl = testimonialCarousel.owlCarousel({
    loop: true,
    margin: 0,
    responsiveClass: true,
    nav: false,
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1024: {
        items: 3,
      },
    },
  });

  $('button.testimonial-nav.prev-nav').click(function (e) {
    e.stopPropagation();
    e.preventDefault();
    owl.trigger('prev.owl.carousel');
  });

  $('button.testimonial-nav.next-nav').click(function (e) {
    e.stopPropagation();
    e.preventDefault();
    owl.trigger('next.owl.carousel');
  });
}
