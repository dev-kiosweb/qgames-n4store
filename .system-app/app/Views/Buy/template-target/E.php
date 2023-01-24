													<div class="col-md-4 col-6 margin-none-m">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control py-3 text-center" placeholder="User ID" autocomplete="off" name="target[]" id="id">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-6 margin-none-m">
                                                        <div class="form-group">
                                                            <select name="target[]" class="form-control py-3 text-center" id="server">
                                                                <option value="">Pilih Server</option>
                                                                <option value="90001">Eternal Love</option>
                                                                <option value="90002">Midnight Party</option>
                                                                <option value="90002003">Memory of Faith</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php if ($games['validasi_status'] == 'Y'): ?>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-primary py-3 w-100" id="btn-cek" onclick="cek_target();" type="button">Cek</button>
                                                    </div>
                                                    <?php endif ?>