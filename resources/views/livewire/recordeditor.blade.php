<div wire:ignore.self class="modal fade" id="recordEditModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $recordId === null ? 'Add Record' : 'Edit Record' }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @foreach ($fields as $field => $value)
                    @continue($field === $primaryKey)
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ $field }}</label>
                        @if (in_array($field, $richFields, true))
                            <div wire:ignore wire:key="quill-{{ $recordId }}-{{ $field }}"
                                x-data="{
                                    init() {
                                        const editor = new Quill(this.$refs.editorEl, { theme: 'snow' });
                                        editor.root.innerHTML = @js($value) ?? '';
                                        editor.on('text-change', () => {
                                            $wire.set('fields.{{ $field }}', editor.root.innerHTML);
                                        });
                                    }
                                }">
                                <div x-ref="editorEl" style="min-height:150px;"></div>
                            </div>
                        @elseif (($fieldTypes[$field] ?? null) === 'date')
                            <input type="date" class="form-control" wire:model="fields.{{ $field }}">
                        @elseif (str_ends_with($field, '_link'))
                        @php $isPdf = $value && \Illuminate\Support\Str::endsWith(strtolower($value), '.pdf'); @endphp
                            <div x-data="{ previewUrl: null, previewType: null, setPreview(event) { const file = event.target.files?.[0]; if (!file) { this.previewUrl = null; this.previewType = null; return; } if (this.previewUrl) URL.revokeObjectURL(this.previewUrl); this.previewUrl = URL.createObjectURL(file); this.previewType = file.type === 'application/pdf' ? 'pdf' : (file.type.startsWith('image/') ? 'image' : null); } }" >                        
                                <input type="file" class="form-control" wire:model="imageUploads.{{ $field }}" accept="image/*,.pdf,application/pdf" x-on:change="setPreview($event)" >
                                <div wire:loading wire:target="imageUploads.{{ $field }}" class="text-muted small mt-1">Uploading...</div>
                                <div class="row my-5">
                                    <div class="col-6 text-center">
                                        <h6 class="fw-bold text-primary mb-1">Preview</h6>
                                        <template x-if="previewType === 'image'"> <div class="mt-2"> <img :src="previewUrl" style="max-height:100px;" alt=""> </div> </template>
                                        <template x-if="previewType === 'pdf'"> <div class="mt-2"> <iframe :src="previewUrl" style="max-height:100px;border:0px solid #ddd;"></iframe> </div> </template>
                                    </div>
                                    <div class="col-6 text-center">
                                        <h6 class="fw-bold text-primary mb-1">Current</h6>
                                        @if ($value)
                                            @if ($isPdf)
                                                <div class="mt-2">
                                                    <iframe src="{{ asset($value) }}" style="max-height:100px;border:0px solid #ddd;"></iframe>
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <img src="{{ asset($value) }}" style="max-height:100px;" alt="">
                                                </div>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @error('imageUploads.' . $field)
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror                        
                        @else
                            <input type="text" class="form-control" wire:model="fields.{{ $field }}">
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" wire:click="save">Save</button>
            </div>
        </div>
    </div>
</div>