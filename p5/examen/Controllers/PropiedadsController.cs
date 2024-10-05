using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Mvc;
using Microsoft.AspNetCore.Mvc.Rendering;
using Microsoft.EntityFrameworkCore;
using examen.Models;

namespace examen.Controllers
{
    public class PropiedadsController : Controller
    {
        private readonly ExamenContext _context;

        public PropiedadsController(ExamenContext context)
        {
            _context = context;
        }

        // GET: Propiedads
        public async Task<IActionResult> Index()
        {
            var examenContext = _context.Propiedads.Include(p => p.IdImpuestoNavigation);
            return View(await examenContext.ToListAsync());
        }

        // GET: Propiedads/Details/5
        public async Task<IActionResult> Details(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var propiedad = await _context.Propiedads
                .Include(p => p.IdImpuestoNavigation)
                .FirstOrDefaultAsync(m => m.IdPropiedad == id);
            if (propiedad == null)
            {
                return NotFound();
            }

            return View(propiedad);
        }

        // GET: Propiedads/Create
        public IActionResult Create()
        {
            ViewData["IdImpuesto"] = new SelectList(_context.Impuestos, "IdImpuesto", "IdImpuesto");
            return View();
        }

        // POST: Propiedads/Create
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Create([Bind("IdPropiedad,Direccion,CodigoCatastral,IdImpuesto")] Propiedad propiedad)
        {
            if (ModelState.IsValid)
            {
                _context.Add(propiedad);
                await _context.SaveChangesAsync();
                return RedirectToAction(nameof(Index));
            }
            ViewData["IdImpuesto"] = new SelectList(_context.Impuestos, "IdImpuesto", "IdImpuesto", propiedad.IdImpuesto);
            return View(propiedad);
        }

        // GET: Propiedads/Edit/5
        public async Task<IActionResult> Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var propiedad = await _context.Propiedads.FindAsync(id);
            if (propiedad == null)
            {
                return NotFound();
            }
            ViewData["IdImpuesto"] = new SelectList(_context.Impuestos, "IdImpuesto", "IdImpuesto", propiedad.IdImpuesto);
            return View(propiedad);
        }

        // POST: Propiedads/Edit/5
        // To protect from overposting attacks, enable the specific properties you want to bind to.
        // For more details, see http://go.microsoft.com/fwlink/?LinkId=317598.
        [HttpPost]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> Edit(int id, [Bind("IdPropiedad,Direccion,CodigoCatastral,IdImpuesto")] Propiedad propiedad)
        {
            if (id != propiedad.IdPropiedad)
            {
                return NotFound();
            }

            if (ModelState.IsValid)
            {
                try
                {
                    _context.Update(propiedad);
                    await _context.SaveChangesAsync();
                }
                catch (DbUpdateConcurrencyException)
                {
                    if (!PropiedadExists(propiedad.IdPropiedad))
                    {
                        return NotFound();
                    }
                    else
                    {
                        throw;
                    }
                }
                return RedirectToAction(nameof(Index));
            }
            ViewData["IdImpuesto"] = new SelectList(_context.Impuestos, "IdImpuesto", "IdImpuesto", propiedad.IdImpuesto);
            return View(propiedad);
        }

        // GET: Propiedads/Delete/5
        public async Task<IActionResult> Delete(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }

            var propiedad = await _context.Propiedads
                .Include(p => p.IdImpuestoNavigation)
                .FirstOrDefaultAsync(m => m.IdPropiedad == id);
            if (propiedad == null)
            {
                return NotFound();
            }

            return View(propiedad);
        }

        // POST: Propiedads/Delete/5
        [HttpPost, ActionName("Delete")]
        [ValidateAntiForgeryToken]
        public async Task<IActionResult> DeleteConfirmed(int id)
        {
            var propiedad = await _context.Propiedads.FindAsync(id);
            if (propiedad != null)
            {
                _context.Propiedads.Remove(propiedad);
            }

            await _context.SaveChangesAsync();
            return RedirectToAction(nameof(Index));
        }

        private bool PropiedadExists(int id)
        {
            return _context.Propiedads.Any(e => e.IdPropiedad == id);
        }
    }
}
