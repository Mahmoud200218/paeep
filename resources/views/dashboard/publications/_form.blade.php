   <div>
       <div class="w-100">
           <div class="pb-12">
               <h1 class="fw-bolder text-dark">Create a new publication</h1>
               <div class="text-muted fw-bold fs-4">If you need more info, please check
                   <a href="#" class="link-primary">Project Guidelines</a>
               </div>
           </div>
           <div class="fv-row mb-8">
               <div class="dropzone" id="kt_modal_create_project_settings_logo">
                   <div class="dz-message needsclick">
                       <span class="svg-icon svg-icon-3hx svg-icon-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                               <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM14.5 12L12.7 9.3C12.3 8.9 11.7 8.9 11.3 9.3L10 12H11.5V17C11.5 17.6 11.4 18 12 18C12.6 18 12.5 17.6 12.5 17V12H14.5Z" fill="black" />
                               <path d="M13 11.5V17.9355C13 18.2742 12.6 19 12 19C11.4 19 11 18.2742 11 17.9355V11.5H13Z" fill="black" />
                               <path d="M8.2575 11.4411C7.82942 11.8015 8.08434 12.5 8.64398 12.5H15.356C15.9157 12.5 16.1706 11.8015 15.7425 11.4411L12.4375 8.65789C12.1875 8.44737 11.8125 8.44737 11.5625 8.65789L8.2575 11.4411Z" fill="black" />
                               <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                           </svg>
                       </span>
                       <div class="ms-4">
                           <h3 class="dfs-3 fw-bolder text-gray-900 mb-1">Drop files here or click to upload.</h3>
                           <input type="file" name="cover_image" class="fw-bold fs-4 text-muted" />Upload up to 10 files
                       </div>
                   </div>
               </div>
           </div>
           <x-form-errors />
           <div class="fv-row mb-8">
               <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                   <span class="required">Publication Title (English)</span>
                   <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify project name"></i>
               </label>
               <input type="text" class="form-control form-control-solid @error('title_en') is-invalid @enderror" placeholder="Enter publication title" name="title_en" value="{{ old('title_en', $publication->translate('en')->title ?? '') }}" />
               @error('title_en')
               <p class="invalid-feedback">{{ $message }}</p>
               @enderror
           </div>
           <div class="fv-row mb-8">
               <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                   <span class="required">Publication Title (Arabic)</span>
                   <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Specify project name"></i>
               </label>
               <input type="text" class="form-control form-control-solid @error('title_ar') is-invalid @enderror)" placeholder="Enter publication title" name="title_ar" value="{{ old('title_ar', $publication->translate('ar')->title ?? '') }}" />
               @error('title_ar')
               <p class="invalid-feedback">{{ $message }}</p>
               @enderror
           </div>

           <div class="d-flex flex-stack">
               <button type="submit" class="btn btn-lg btn-primary" data-kt-element="settings-next">
                   Submit
               </button>
           </div>
       </div>
   </div>